<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/registrations/registration-5/assets/css/registration-5.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<section class="p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="card border-light-subtle shadow-sm">
      <div class="row g-0">
        <div class="col-12 col-md-6 text-bg-primary">
          <div class="d-flex align-items-center justify-content-center h-100">
            <div class="col-10 col-xl-8 py-3">
            
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-5">
                  <h2 class="h3">Registration</h2>
                  <h3 class="fs-6 fw-normal text-secondary m-0">Enter your details to register</h3>
                </div>
              </div>
            </div>

            <!-- Updated form action and inputs -->
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                  <label for="name" class="form-label">Your Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required value="{{ old('name') }}">
                  @error('name')
                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="email" class="form-label">Your Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                  @error('email')
                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" name="password" id="password" required>
                
                  @error('password')
                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="confirm_password" class="form-label">Repeat your password</label>
                  <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
                 
                  @error('confirm_password')
                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                  @enderror
                  @if ($errors->has('password_mismatch'))
                    <div class="invalid-feedback" style="display: block;">
                      {{ $errors->first('password_mismatch') }}
                    </div>
                  @endif
                </div>
                <div class="col-12">
                  <label for="location" class="form-label">Location:</label>
                  <input type="text" class="form-control" name="location" id="location" required value="{{ old('location') }}">
                  @error('location')
                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="phone" class="form-label">Phone Number:</label>
                  <input type="tel" class="form-control" name="phone_number" id="phone" required value="{{ old('phone') }}">
                  @error('phone')
                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="role" class="form-label">Role:</label>
                  <select name="role" id="role" class="form-select" required>
                    <option value="admin">Admin</option>
                    <option value="book_owner">Owner</option>
                  </select>
                  @error('role')
                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn bsb-btn-xl btn-primary" type="submit">Sign up</button>
                  </div>
                </div>
              </div>
            </form>

            <div class="row">
              <div class="col-12">
                <hr class="mt-5 mb-4 border-secondary-subtle">
                <p class="m-0 text-secondary text-center">Already have an account? <a href="{{ route('login') }}" class="link-primary text-decoration-none">Sign in</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
    function togglePasswordVisibility(inputId) {
        var passwordInput = document.getElementById(inputId);
        passwordInput.type = (passwordInput.type === "password") ? "text" : "password";
    }
</script>

</html>
