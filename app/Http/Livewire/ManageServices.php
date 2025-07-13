<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ManageServices extends Component

{

    use withPagination;
    use withFileUploads;

    public $confirmingServiceDeletion = false;
    public $confirmingServiceAdd = false;
    public $confirmingServiceEdit = false;

    public $search;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public $newService, $name, $description, $price, $is_hidden, $image = false;

    protected function rules()
    {
        $rules = [
            'newService.name' => 'required|string|min:1|max:255',
            'newService.slug' => 'unique:services,slug,' . ($this->newService['id'] ?? ''),
            'newService.description' => 'required|string|min:1|max:255',
            'newService.price' => 'required|numeric|min:0',
            'newService.is_hidden' => 'nullable|boolean',
            'newService.category_id' => 'required|integer|exists:categories,id',
            'newService.allergens' => 'nullable|string|min:1|max:255',
            'newService.cautions' => 'nullable|string|min:1|max:255',
            'newService.benefits' => 'nullable|string|min:1|max:255',
            'newService.aftercare_tips' => 'nullable|string|min:1|max:255',
            'newService.notes' => 'nullable|string|min:1|max:255',

        ];

        // Jika image berupa file upload, validasi sebagai file gambar, tetapi tidak wajib (nullable)
        if ($this->image instanceof \Illuminate\Http\UploadedFile) {
            $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png,svg,gif,webp|max:204800';
        }

        return $rules;
    }

    protected function messages()
    {
        return [
            'newService.name.required' => 'Nama layanan harus diisi.',
            'newService.name.min' => 'Nama layanan minimal harus 1 karakter.',
            'newService.name.max' => 'Nama layanan maksimal 255 karakter.',

            'newService.slug.unique' => 'Slug layanan sudah digunakan.',

            'newService.description.required' => 'Deskripsi harus diisi.',
            'newService.description.min' => 'Deskripsi minimal 1 karakter.',
            'newService.description.max' => 'Deskripsi maksimal 255 karakter.',

            'newService.price.required' => 'Harga harus diisi.',
            'newService.price.numeric' => 'Harga harus berupa angka.',
            'newService.price.min' => 'Harga tidak boleh kurang dari 0.',

            'newService.is_hidden.boolean' => 'Status tersembunyi harus bernilai benar atau salah.',

            'newService.category_id.required' => 'Kategori wajib dipilih.',
            'newService.category_id.exists' => 'Kategori yang dipilih tidak tersedia.',

            'newService.allergens.min' => 'Informasi alergen minimal 1 karakter.',
            'newService.allergens.max' => 'Informasi alergen maksimal 255 karakter.',

            'newService.cautions.min' => 'Peringatan minimal 1 karakter.',
            'newService.cautions.max' => 'Peringatan maksimal 255 karakter.',

            'newService.benefits.min' => 'Manfaat minimal 1 karakter.',
            'newService.benefits.max' => 'Manfaat maksimal 255 karakter.',

            'newService.aftercare_tips.min' => 'Tips perawatan minimal 1 karakter.',
            'newService.aftercare_tips.max' => 'Tips perawatan maksimal 255 karakter.',

            'newService.notes.min' => 'Catatan minimal 1 karakter.',
            'newService.notes.max' => 'Catatan maksimal 255 karakter.',

            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpg, jpeg, png, svg, gif, atau webp.',
            'image.max' => 'Ukuran gambar maksimal 200MB.',
        ];
    }

    protected function attributes()
    {
        return [
            'newService.name' => 'nama layanan',
            'newService.slug' => 'slug',
            'newService.description' => 'deskripsi',
            'newService.price' => 'harga',
            'newService.is_hidden' => 'status tersembunyi',
            'newService.category_id' => 'kategori',
            'newService.allergens' => 'alergen',
            'newService.cautions' => 'peringatan',
            'newService.benefits' => 'manfaat',
            'newService.aftercare_tips' => 'tips perawatan',
            'newService.notes' => 'catatan',
            'image' => 'gambar',
        ];
    }

    public function render()
    {

        $services = Service::when($this->search, function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('slug', 'like', '%'.$this->search.'%')
                    ->orWhere('description', 'like', '%'.$this->search.'%')
                ->orWhere('price', 'like', '%'.$this->search.'%')
                ->orWhereHas('category', function ($query) {
                    $query->where('name', 'like', '%'.$this->search.'%');
                });
            })
            ->orderByPrice('PriceLowToHigh')
            ->with('category')
            ->paginate(10);

        $categories = \App\Models\Category::all();

        return view('livewire.manage-services', compact('services'), compact('categories'));
    }

    public function confirmServiceDeletion($id)
    {
        $this->confirmingServiceDeletion = $id;


    }

    public function deleteService(Service $service)
    {
        $service->delete();

        session()->flash('message', 'Service successfully deleted.');
        $this->confirmingServiceDeletion = false;

    }


    public function confirmServiceAdd() {

        $this->reset(['newService']);
        $this->reset(['image']);
        $this->confirmingServiceAdd = true;


    }

    public function confirmServiceEdit( Service $newService ) {
        $this->newService = $newService;

        $this->image = $newService->image;

        $this->confirmingServiceAdd = true;
    }



    public function saveService() {
        // validate all the rules except the image field
        $this->validateOnly('newService.name');
        $this->validateOnly('newService.description');
        $this->validateOnly('newService.price');
        $this->validateOnly('newService.is_hidden');
        $this->validateOnly('newService.category_id');
        $this->validateOnly('newService.allergens');
        $this->validateOnly('newService.cautions');
        $this->validateOnly('newService.benefits');
        $this->validateOnly('newService.aftercare_tips');
        $this->validateOnly('newService.notes');

        if (isset($this->newService['id'])) {

            // If a new image is uploaded then delete the old one
            if ($this->image instanceof \Illuminate\Http\UploadedFile) {

                $this->validateOnly('image');
                // get original image of the old one and delete it from the disk
                $originalImage = Service::find($this->newService['id'])->image;
                $originalImage = str_replace('storage', 'public', $originalImage);
                Storage::delete($originalImage);

                // save the image and get the path
                $this->image = $this->image->store('images', 'public');

            }

            // save the service
            $this->newService['image'] = $this->image;

            if ($this->newService->isDirty('name')) {
                $this->newService->slug = \Str::slug($this->newService->name);
                $this->validate(['newService.slug' => 'unique:services,slug,' . $this->newService->id]);
            }

            $this->newService->save();

        } else {
            // create a slug

            $this->newService['slug'] = \Str::slug($this->newService['name']);
            $service = Service::create($this->newService);

        }

        session()->flash('message', 'Service successfully saved.');

        $this->confirmingServiceAdd = false;


    }
}
