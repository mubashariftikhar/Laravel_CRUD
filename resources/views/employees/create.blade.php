<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> LARAVEL CRUD </title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>

<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">Employees CRUD APP</div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Employees</div>
            <div>
                <a href="{{ route('employees.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Your Name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}
                            </p>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="email"class="form-label">Email</label>
                        <input type="email"name="email" id="email" placeholder="Enter Your Email"
                            class="form-control @error('email') is-invalid @enderror"value="{{ old('email') }}">
                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role"class="form-label">Position</label>
                        <select name="role" id="role"class="form-control @error('role') is-invalid @enderror">
                            <option value="{{ old('role') }}">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->position }}</option>
                            @endforeach
                            @error('role')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="department"class="form-label">Department</label>
                        <select name="department"
                            id="department"class="form-control @error('department') is-invalid @enderror">
                            <option value="{{ old('department') }}">Select Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                            @error('department')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="address"class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="4"
                            placeholder="Enter your Address">{{ old('address') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-control"></label>
                        <input type="file" name="image"class="@error('image') is-invalid @enderror">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt">Save Employee</button>
        </form>


    </div>


</body>

</html>
