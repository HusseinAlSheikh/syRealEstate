<x-admin :selected="'properties'">

    {{--@if ($errors->any())--}}
        {{--<div class="alert alert-danger">--}}
            {{--<ul>--}}
                {{--@foreach ($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endif--}}

    <div class="flex flex-col">
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">

            <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                <h3 class="font-semibold text-black dark:text-white">
                    Add New Property
                </h3>
            </div>
            <form action="{{route('properties.store')}}" method="POST">
                @csrf
                <div class="p-6.5">

                    <div class="mb-4.5 ">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Name (EN)
                        </label>
                        <input type="text" name="name_en" placeholder="" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary " value="{{old('name_en')}} ">
                        <x-error :name="'name_en'"/>

                    </div>
                    <div class="mb-4.5 ">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Name (AR)
                        </label>
                        <input type="text" name="name_ar" placeholder="" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary " value="{{old('name_ar')}} ">
                        <x-error :name="'name_ar'"/>

                    </div>

                    <button type="submit" class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>


</x-admin>
