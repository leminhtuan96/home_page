@extends('welcome')
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    @error('msg')
    <div class="alert alert-danger text-center">{{ $message }}</div>
    @enderror
    <div class="card card-default">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">name</span>
                        </div>
                        <input name="name" value="{{ old('name') }}" class="form-control" type="text"
                               placeholder="name">
                    </div>
                    <p style="color: red">{{ $errors->has('name') ? $errors->first('name') : '' }}</p>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">file</label>
                        <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <p style="color: red">{{ $errors->has('file') ? $errors->first('file') : '' }}</p>

                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
</form>
