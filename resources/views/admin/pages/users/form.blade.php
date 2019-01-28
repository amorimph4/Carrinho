
{{ csrf_field() }}

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label  class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="edit-name" type="text" class="form-control" name="name" value="@{{ User.name }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label  class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="edit-email" type="email" class="form-control" name="email" value="@{{ User.email }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-md-4">Cargo</label>

                <div class="col-md-6" >
                    <select id="edit-input-office" required="true" class="form-control"  name="office_id">
                        
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="control-label col-md-4">Grupo</label>

                <div class="col-md-6">
                    <select id="edit-input-group" required="true" class="form-control"  name="group_id">
                        
                    </select>
                </div>
            </div>
            <br/>
            <div class="form-group">
                <div class=" col-md-offset-3">
                    <button type="submit" class="btn btn-primary">salvar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">voltar</button>
                </div>
            </div>
        </div>
    </div>
</div>

