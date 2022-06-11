<?php

namespace App\Http\Livewire\Dashborad\setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use JoeDixon\Translation\Drivers\Translation;
use App\Http\Controllers\Api\Traits\GeneralTrait;
use JoeDixon\Translation\Http\Requests\LanguageRequest;
class Setting extends Component
{
    use WithFileUploads;
    public $logo,$favicon;
    use GeneralTrait;

    private $translation;

    public function mount(Translation $translation)
    {
        $this->translation = $translation;
    }

        public function submit(){
            if ($this->logo != null){
                $this->logo = $this->uploadimages('assets',$this->logo);
                // config()->set('setting_var.images.logo', $this->logo);
                config(['setting_var.images.logo' => $this->logo]);

            }
            if ($this->favicon != null){
                $this->favicon = $this->uploadimages('assets',$this->favicon);
                config()->set('setting_var.images.favicon', $this->favicon);
            }

            if ($this->favicon != null || $this->logo != null){
            session()->flash('message', 'Save Changes');
            }

        }


    public function render()
    {

        $languages =  $this->translation->allLanguages();

        return view('livewire.dashborad.setting.setting',['languages' =>   $languages ])->layout('admin.layouts.masterdash');
    }
}
