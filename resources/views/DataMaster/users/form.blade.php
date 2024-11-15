<x-layout>
  <div class="p-4">
    <div class="bg-base-100 w-full rounded-lg shadow">
      <!-- <h5 class="bg-base-300 rounded-t-lg p-4 text-base font-bold">JS Validation</h5> -->
      <div class="w-full p-4">
        <form class="needs-validation peer grid gap-y-4" novalidate>
          <!-- Account Details -->
          <div class="w-full">
            <h6 class="text-lg font-semibold">1. Account Details</h6>
            <hr class="mb-4 mt-2" />
          </div>

          <!-- First Name and Last Name -->
          <div class="w-full">
            <label class="form-control">
              <div class="label">
                <span class="label-text">First Name</span>
              </div>
              <input type="text" placeholder="John" class="input" required />
              <span class="error-message">Please enter your name.</span>
              <span class="success-message">Looks good!</span>
            </label>
          </div>
          <div class="w-full">
            <label class="form-control">
              <div class="label">
                <span class="label-text">Last Name</span>
              </div>
              <input type="text" placeholder="Doe" class="input" required />
              <span class="error-message">Please enter your last name.</span>
              <span class="success-message">Looks good!</span>
            </label>
          </div>

          <!-- Email and password -->
          <div class="w-full">
            <label class="form-control">
              <div class="label">
                <span class="label-text">Email</span>
              </div>
              <input type="email" class="input" placeholder="john@gmail.com" aria-label="john@gmail.com" required="" />
              <span class="error-message">Please enter a valid email</span>
              <span class="success-message">Looks good!</span>
            </label>
          </div>

          <div class="w-full">
            <label class="form-control">
              <div class="label">
                <span class="label-text">Password</span>
              </div>
              <div class="input-group">
                <input id="password" type="password" class="input" placeholder="Enter password" required />
                <span class="input-group-text">
                  <button type="button" data-toggle-password='{ "target": "#password" }' class="block">
                    <span class="icon-[tabler--eye] text-base-content/80 password-active:block hidden size-4 flex-shrink-0"></span>
                    <span class="icon-[tabler--eye-off] text-base-content/80 password-active:hidden block size-4 flex-shrink-0"></span>
                  </button>
                </span>
              </div>
              <span class="error-message">Please enter a valid password</span>
              <span class="success-message">Looks good!</span>
            </label>
          </div>

          <!-- Terms and Conditions -->
          <div class="w-full">
            <label class="flex items-center gap-3">
              <input type="checkbox" class="checkbox checkbox-primary" id="check1" required />
              <span class="label cursor-pointer flex-col items-start">
                <span class="label-text text-base">Agree to our terms and conditions</span>
              </span>
            </label>
            <span class="error-message">Please confirm our T&C</span>
            <span class="success-message">Looks good!</span>
          </div>

          <!-- Submit button -->
          <div class="mt-6">
            <button type="submit" name="submitButton" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>
