<x-admin :selected="'neighbourhoods'">
    {{--@session('success')--}}
        {{--<div class="absolute alert ">--}}
            {{--This is success --}}
        {{--</div>--}}
    {{--@endsession--}}
    <div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">

            <h4 class="mb-6 text-xl font-bold text-black dark:text-white">
                Neighbourhoods
            </h4>
        <div class="flex flex-col  ">
            <div class="grid grid-cols-3 rounded-sm bg-gray-2 dark:bg-meta-4 sm:grid-cols-5 ">
                <div class="p-2.5 xl:p-5">
                    <h5 class="text-sm font-medium  xsm:text-base">Neighbourhood (EN)</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium  xsm:text-base">Neighbourhood (AR)</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium  xsm:text-base">City</h5>
                </div>
                <div class="p-2.5 text-center sm:block xl:p-5">
                    <h5 class="text-sm font-medium  xsm:text-base">Options</h5>
                </div>
            </div>
            @foreach($neighbourhoods as $neighbourhood)
                 <div class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-5">
                <div class="flex items-center gap-3 p-2.5 xl:p-5">
                    <p class="hidden font-medium text-black dark:text-white sm:block">
                        {{$neighbourhood->name_en}}
                    </p>
                </div>

                <div class="flex items-center justify-center p-2.5 xl:p-5">
                    <p class="font-medium text-black dark:text-white">
                       {{$neighbourhood->name_ar}}
                    </p>
                </div>

                <div class="flex items-center justify-center p-2.5 xl:p-5">
                    <p class="font-medium text-black dark:text-white">
                       {{$neighbourhood->city->name_ar}}
                    </p>
                </div>



                <div class="flex items-center justify-center p-2.5 sm:flex xl:p-5">
                    <span class="font-medium text-black dark:text-white">
                        <a href="{{route('neighbourhoods.edit' , ['neighbourhood' => $neighbourhood->id])}}">Edit</a>
                        <form method="POST" action="{{route('neighbourhoods.destroy' ,['neighbourhood' => $neighbourhood->id] )}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" >Delete</button>
                        </form>
                    </span>
                </div>

            </div>
            @endforeach
        </div>
        <div class="flex flex-col p-4">
            {{$neighbourhoods->links()}}
        </div>
        <div class="flex flex-col">
            <a href="{{route('neighbourhoods.create')}}" class="inline-flex items-center justify-center gap-2.5 bg-primary py-4 px-10 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                      <span>
                       <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.0002 7.79065C11.0814 7.79065 12.7689 6.1594 12.7689 4.1344C12.7689 2.1094 11.0814 0.478149 9.0002 0.478149C6.91895 0.478149 5.23145 2.1094 5.23145 4.1344C5.23145 6.1594 6.91895 7.79065 9.0002 7.79065ZM9.0002 1.7719C10.3783 1.7719 11.5033 2.84065 11.5033 4.16252C11.5033 5.4844 10.3783 6.55315 9.0002 6.55315C7.62207 6.55315 6.49707 5.4844 6.49707 4.16252C6.49707 2.84065 7.62207 1.7719 9.0002 1.7719Z" fill=""></path>
                        <path d="M10.8283 9.05627H7.17207C4.16269 9.05627 1.71582 11.5313 1.71582 14.5406V16.875C1.71582 17.2125 1.99707 17.5219 2.3627 17.5219C2.72832 17.5219 3.00957 17.2407 3.00957 16.875V14.5406C3.00957 12.2344 4.89394 10.3219 7.22832 10.3219H10.8564C13.1627 10.3219 15.0752 12.2063 15.0752 14.5406V16.875C15.0752 17.2125 15.3564 17.5219 15.7221 17.5219C16.0877 17.5219 16.3689 17.2407 16.3689 16.875V14.5406C16.2846 11.5313 13.8377 9.05627 10.8283 9.05627Z" fill=""></path>
                      </svg>
                      </span>
                Add New Neighbourhood
            </a>
        </div>

    </div>

</x-admin>
