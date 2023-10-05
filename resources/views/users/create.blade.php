<x-admin :selected="'users'">

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
                    Add New User
                </h3>
            </div>
            <form action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="p-6.5">
                    <div class="mb-4.5 ">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Name
                        </label>
                        <input type="text" name="name" placeholder="Enter your full name" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary " value="{{old('name')}} ">
                        @error('name')
                            <div class="text-sm font-medium   text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Email
                        </label>
                        <input type="email" name="email" placeholder="Enter your email address" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"  value="{{old('email')}}" >
                        @error('email')
                            <div class="text-sm font-medium   text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Password
                        </label>
                        <input type="password" name="password" placeholder="Enter password" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                        @error('password')
                            <div class="text-sm font-medium   text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            User Type
                        </label>
                        <select  name="user_type" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                            <option></option>
                            @foreach($userType as $code => $type)
                                <option value="{{$code}}"  {{ old('user_type') == $code ? 'selected' : ''}} >{{$type}}</option>
                            @endforeach
                        </select>
                        @error('user_type')
                            <div class="text-sm font-medium   text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>


</x-admin>
