
    <div class="form-group">
        <label for="name" class="control-label">Name</label>
        <input id="name" value="{{ isset($role) ? $role->name : old('name') }}" type="text" name="name"
               class="form-control" autofocus>
        @error('name')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="row">
        @foreach($permissions as $key => $permission)
            <div class="col-sm-2 mb-3">
                <div class="card h-100">
                    <ul class="list-group">
                        @php
                            $count = strlen($key);
                        @endphp
                        <li class="list-group-item {{ @$count > 15 ? 'custom-font-size' : ''  }} card card-primary bg-primary">
                            {{ ucfirst(str_replace('_', ' ', $key)) }}
                        </li>
                        @foreach($permission as $pms)
                            <li class="list-group-item">
                                @php
                                    $check_permissions = isset($role->permissions) ? $role->permissions()->pluck('id')->toArray() : []
                                @endphp
                                <input id="{{ $key.$loop->index }}" name="permission_ids[]"
                                       {{ in_array($pms->id, $check_permissions) ? 'checked' : '' }}   value="{{ $pms->id }}"
                                       type="checkbox" class="i-checks">
                                <label for="{{ $key.$loop->index }}">{{ ucwords(str_replace($key, ' ', $pms->name)) }}</label>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
        @error('permission_ids')
        <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
        <br>
        <br>
        @enderror
    </div>

