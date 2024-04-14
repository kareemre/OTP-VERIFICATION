<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header text-center">
          <h3>Verify OTP</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="{{route('register.otp')}}">
            @csrf
            <div class="form-group mb-3">
              <label for="otp" class="form-label">Enter OTP</label>
              <div class="input-group">
                <input type="text" class="form-control " id="otp" name="otp" maxlength="6" autofocus required>
                <div class="invalid-feedback">
                  <!-- @error('otp')
                    {{ $message }}
                  @enderror -->
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Verify OTP</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
