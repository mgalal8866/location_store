<?php

namespace App\Http\Livewire\Dashborad\setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\Cache;
use App\Models\setting as ModelsSetting;
use JoeDixon\Translation\Drivers\Translation;
use App\Http\Controllers\Api\Traits\GeneralTrait;
use PhpParser\Node\Stmt\Foreach_;

class Setting extends Component
{
    use WithFileUploads;
    public $logo,$favicon,$timebackup;
    use GeneralTrait;

    private $translation;
    public $i =0;
    public $state = [];
    public $settings_sections, $backupgoogle,  $section = 'general' ,$settings,$setting ,$valueform ,$notifytime;
    public function mount()
    {
        $this->notifytime = getSettingsOf('notify');
        $this->backupgoogle = getSettingsOf('backupgoogle');
        $this->reset('i');
        $this->reset('valueform');

        $this->settings_sections = ModelsSetting::whereShow(0)->select('section')->distinct()->pluck('section');
        $this->settings = ModelsSetting::whereShow(0)->whereSection($this->section)->get();

        foreach($this->settings as $settingitem)
        {
            $this->valueform[$this->i]['value'] = $settingitem->value ;
            $this->valueform[$this->i]['id'] = $settingitem->id ;
            $this->valueform[$this->i]['key'] = $settingitem->key ;
            $this->i +=  1;
        }

    }

    public function UpdatedSection(){
            $this->reset('i');
            $this->reset('valueform');
            $this->settings_sections = ModelsSetting::whereShow(0)->select('section')->distinct()->pluck('section');
            $this->settings = ModelsSetting::whereShow(0)->whereSection($this->section)->get();
            foreach($this->settings as $settingitem)
            {
                $this->valueform[$this->i]['value'] = $settingitem->value ;
                $this->valueform[$this->i]['id'] = $settingitem->id ;
                $this->valueform[$this->i]['key'] = $settingitem->key ;
                $this->i +=  1;
            }

    }
    public function UpdatedBackupgoogle(){
        $settings = Valuestore::make(config_path('settings.json'));
        $settings->put('backupgoogle', $this->backupgoogle);
        $this->dispatchBrowserEvent('successmsg',['msg' => 'Backup Time Updated successfully!']);
    }
    public function UpdatedNotifytime(){
        $settings = Valuestore::make(config_path('settings.json'));
        $settings->put('notify', $this->notifytime);
        $this->dispatchBrowserEvent('successmsg',['msg' => 'notify Time Updated successfully!']);
    }
    public function up($section){
        foreach($this->valueform as $item)
            {
                $settings = Valuestore::make(config_path('settings.json'));
                $setsetting = ModelsSetting::whereShow(0)->whereSection($this->section)->whereId($item['id'])->first();
                $setsetting->update($item);
                $settings->put($setsetting->key, $item['value']);
            }
        $this->dispatchBrowserEvent('successmsg',['msg' => 'Settings updated successfully!']);
    }


        public function updateSetting()
        {
            // $setting = ModelsSetting::first();
            // if ($setting) {
            //     $setting->update($this->state);
            // } else {
            //     ModelsSetting::create($this->state);
            // }
            // Cache::forget('setting');

            // $this->dispatchBrowserEvent('successmsg',['msg' => 'Settings updated successfully!']);
        }

        public function render()
        {
            return view('livewire.dashborad.setting.setting')->layout('admin.layouts.masterdash');
        }
}
