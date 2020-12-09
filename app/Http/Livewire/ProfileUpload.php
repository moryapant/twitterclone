<?php


namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;


class ProfileUpload extends Component



{

    use WithFileUploads;
    public $firstName = '';
    public $email = '';
    public $about = '';
    public $status = 0 ;
    public $uploadStatus = 0 ;
    public $gravatar;
    public $image;
    public $FilenamewithExtension;
    public $dbPath;

  
   
    // public $default = "https://www.somewhere.com/homestar.jpg";
    // public $size = 40;


    protected $rules = [
        // 'firstName' => 'required',
        // 'email' => 'required|email',
        'about' => 'required|min:10',
        'image' => 'mimes:jpeg,png,gif',
    ];


    public function save() {

        $this->firstName;
        $this->email;
        $this->about;
        $this->image ;


        $this->flight = User::where('id', auth()->user()->id)

        ->update(['about' => $this->about]);

        $this->status = 1;


        } 


    public function saveImage() {

        $this->image;

    


        if($this->image) {
        $this->FilenamewithExtension = (auth()->user()->id . '_' . time(). '.' . $this->image->getClientOriginalName());

        $this->image->storeAs('public/image/', $this->FilenamewithExtension);

        //$this->dbPath =  $this->FilenamewithExtension;

        $this->dbPath = '/image/'. auth()->user()->id . '_' . time(). '.' . $this->image->getClientOriginalName();

        $this->flight = User::where('id', auth()->user()->id)

        ->update(['avatar' => $this->dbPath,'about' => $this->about]);
        
        // $this->uploadStatus = 1;

        // dd($this->status);
        
        } 


       
       
        
    }

                


    public function test() {



       $this->image;

         $this->FilenamewithExtension = (auth()->user()->id . '_' . time(). '.' . $this->image->getClientOriginalName());
         $this->image->storeAs('public/image/', $this->FilenamewithExtension);
         $this->dbPath = '/image/'. auth()->user()->id . '_' . time(). '.' . $this->image->getClientOriginalName();

         $this->flight = User::where('id', auth()->user()->id)
         ->update(['avatar' => $this->dbPath,'about' => $this->about]);

        $this->uploadStatus = 1 ;

       

        } 
          
        

    public function mount() {

        //$this->gravatar = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) . "?d=" . urlencode( $this->default ) . "&s=" . $this->size;

        $this->firstName = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->about = auth()->user()->about;
        $this->image = auth()->user()->avatar;
    }


    public function updated() {

       
    }


    public function render()
    {
        return view('livewire.profile-upload');
    }
}
