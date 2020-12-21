<?php


namespace App\Traits;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait HelperTrait
{
    protected $image_name;
    protected $image_path;
    protected $image_type;
    protected $personal_name;
    protected $personal_define;
    protected $disk_name;
    protected $path_want_be_delete;
    protected $old_image_path;
    protected $old_image_name;
    protected $image_width;
    protected $image_height;
    protected $old_data_object;
    protected $new_path_want_be_rename;

    ####### Begin uploadImageProcessing Function #########
    public function uploadImageProcessing($_photoName, $_personalDefine, $_photoType, $_personalName, $_diskName, $_photoWidth, $_photoHeight, $_oldDataObject = null)
    {
        $this -> image_type         = $_photoType;
        $this -> personal_name      = $_personalName;
        $this -> personal_define    = $_personalDefine;
        $this -> disk_name          = $_diskName;
        $this -> image_width        = $_photoWidth;
        $this -> image_height       = $_photoHeight;
        $this -> old_data_object    =  $_oldDataObject;
        $this -> old_image_name     = $this -> old_data_object?$this -> old_data_object -> image_name:'default.png';
        $this -> old_image_path     = $this -> old_data_object?$this -> old_data_object -> image_path:null;
        $this -> image_name         = $_photoName?$_photoName -> hashName():$this -> old_image_name;
        $this -> image_path         = $_photoName?$this -> personal_define .DS. $this -> image_type .DS. $this -> personal_name:$this -> old_image_path;

        if ($this -> old_data_object){ // This Condition Only Use On Update Case If old_data_object Not Equal Null

            ############################  Check Request Has Image Do It ############################
            #   1- [ Get Old Image Path From Database ]
            #   2- [ Convert Path To Array ]
            #   3- [ Delete Last Part From Path ]
            #   4- [ Save New Path In Variable ]
            #   5- [ Get Old Personal Name And Save In Variable ]
            ############################  Check Request Has Image Do It ############################

            $path_array                         = explode(DS,  $this -> old_image_path); // array
            $this -> path_want_be_delete        = $this -> old_image_path?$path_array[0] .DS.  $path_array[1] .DS.  $path_array[2]:'';
            $this -> new_path_want_be_rename    = $this -> old_image_path?$path_array[0] .DS.  $path_array[1] .DS. $this -> personal_name:'';
            $old_personal_name                  = $this -> old_data_object -> name;

            if($_photoName){
                ############################  Check Request Has Image Do It ############################
                #   1- [ Check Image Path If Exists Delete The Path ]
                ############################  Check Request Has Image Do It ############################
                if (Storage::disk($this -> disk_name)->exists($this -> path_want_be_delete))
                    Storage::disk($this -> disk_name)->deleteDirectory($this -> path_want_be_delete);

            }else{

                ############################  Check Request Dos Not Have Image Do It ############################
                #   1- [ Check Old Personal Name Not Equal New Personal Name ]
                #   2- [ Check Image Path If Exists Rename The Personal name Directory To New Personal Name ]
                #   3- [ Update Value Image Path Variable To New Path  ]
                ############################  Check Request Dos Not Have Image Do It ############################

                if ($old_personal_name !== $this -> personal_name){
                    if (Storage::disk($this -> disk_name)->exists($this -> path_want_be_delete))
                        Storage::disk($this -> disk_name)->move($this -> path_want_be_delete, $this -> new_path_want_be_rename);
                    $this -> image_path = $this -> new_path_want_be_rename;
                }
            }
        }

        if ($_photoName){  // This Condition Use On Create And Update Case
            ############################  Check Request Has Image Do It ############################
            #   1- [ Check Image Path If Not Exists Make This is Path ]
            #   2- [ Make And upload Image In To New Path  ]
            ############################  Check Request Has Image Do It ############################
            if (!Storage::disk($this -> disk_name)->exists($this -> image_path))
                Storage::disk($this -> disk_name)->makeDirectory($this -> image_path);
            $image = Image::make($_photoName);
            $image -> resize($this -> image_width, $this -> image_height);
            $image -> save(public_path('storage' .DS. $this -> image_path.DS.$this -> image_name));

        }

        return ['image_path' => $this -> image_path, 'image_name' => $this -> image_name];


    }
    ####### End uploadImageProcessing Function #########

    ####### Begin deleteImageHandel Function #########
    /**
     * @param string $storageDiskName                       Example public Or S3
     * @param string $pathOfTheDirectoryYouWantToDelete     Example user/profile/username -> [ Mohamed ]
     */

    public function deleteImageHandel($storageDiskName, $pathOfTheDirectoryYouWantToDelete)
    {
        $this -> disk_name              = $storageDiskName;
        $this -> path_want_be_delete    = $pathOfTheDirectoryYouWantToDelete;
        // Check profile picture Of Doctor Exists And Not Default Image
        if (Storage::disk($this -> disk_name) ->exists($this -> path_want_be_delete)){
            // Remove Picture And Folder For The Doctor Until Doctor Name Folder
            Storage::disk($this -> disk_name) ->deleteDirectory($this -> path_want_be_delete);
        }
    }
    ####### End deleteImageHandel Function #########
}
