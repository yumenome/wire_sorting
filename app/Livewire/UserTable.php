<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public $perPage = 5;

    #[Url(history:true)]
    public $search = '';

    #[Url(history:true)]
    public $admin = '';

    #[Url(history:true)]
    public $sortBy = 'created_at';

    #[Url(history:true)]
    public $sortByDirection = 'DESC';

    public function updatedSearch(){
        $this->resetPage();
    }

    public function delete(User $user){
        $user->delete();
    }

    public function setSorting($sortByField){

        if($this->sortBy === $sortByField){
            $this->sortByDirection = ($this->sortByDirection === 'ASC') ?'DESC':'ASC';
        }
        $this->sortBy = $sortByField;
    }

    public function render()
    {
        return view('livewire.user-table',[
            'users' => User::search($this->search)
                            ->when($this->admin !== '', function($query){
                                $query->where('is_admin', $this->admin);
                            })
                            ->orderBy($this->sortBy, $this->sortByDirection)
                            ->paginate($this->perPage)
        ]);
    }
}
