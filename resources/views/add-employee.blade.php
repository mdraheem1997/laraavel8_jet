<x-app-layout>
    <x-slot name="header">
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Employee') }}
            
        </h2>
    </x-slot>

    <body>
    <div class="container mt-4">
        <div class="row">

            <div class="col-md-2"></div>
            <div class="col-md-8">
                @if(session('msg'))
                        <div class="alert alert-success">{{session('msg')}}</div>
                        @endif
                <!-- <div class="card-header">
                    <h3>Add Admins</h3>
                </div> -->
                <div class="card">
                    <div class="card-body">

                        <form action="add-employee" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            <label>Mobile</label>
                            <input type="number" name="mobile" class="form-control" value="{{old('mobile')}}">
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
@include('header')

</html>