    <div class="" style="width-max:700px">
            
        <div class="h-auto bg-blue-100">
 
       
      
            <div x-data="app()" x-cloak>
                <div class="max-w-3xl mx-auto px-4 py-10">
        
                    
                    <div x-show.transition="step != 'complete'">	
                       
                        
                    <strong>Hello, {{Auth::user()->name}} </strong>
                        <div class="py-10">	
                            <div x-show.transition.in="step === 1">
                             
                    

                         

                        <img class="w-64 h-64 rounded-full mt-2 mb-4 m-auto items-center object-cover m-auto" style=""
                      

                        @if($this->uploadStatus === 1)
                         src="{{$this->image->temporaryUrl()}}"
                       @else
                        src="{{auth()->user()->avatar}}" 
                       @endif 

                        alt="">

                            
                              


                    <input  class="mb-4" wire:model="image" type="file" name="image" id="">

                  
                   
                    
                    <div class="mb-8">
                        <button wire:click="test" class="bg-blue-500 rounded-full shadow-lg py-2 px-4 text-white text-sm" type="submit">Submit</button>                        
                        
                        {{-- <a wire:click="saveImage" href="">click</a> --}}
                        
                        </div> 

                        <div>
                               
                          
                            @if($this->uploadStatus === 1 )

                            <p>Image Uploaded</p>

                            @endif
                        </div>
                        
                       

                <div class="mb-4 mt-16" >
                        <label for="about" class="font-bold mb-1 text-gray-700 block">About:taggline</label>
                        <input type="text" wire:model="about"
                            class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                    placeholder="About Yourself">
                </div>

                <div class="mb-5">
                    <button wire:click="save" class="bg-blue-500 rounded-full shadow-lg py-2 px-4 text-white text-sm" type="submit">Submit</button>
                </div>
                
                   @if ( $this->status === 1 )
            
                   <span><p>Updated!</p></span>
                       
                   @endif
                
                </div>
                        
                        
                        </div>

                      
                        <!-- / Step Content -->
                    </div>
                </div>
        
                <!-- Bottom Navigation -->	
            
                <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->	
            </div>
        </div>

        </div>
    
        
    
    
    
    
    
    
    
    
    
  
