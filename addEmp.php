<?php require "header&footer/head_sub_page.php"; ?>
    <div class="formbold-main-wrapper">
      <!-- Author: FormBold Team -->
      <!-- Learn More: https://formbold.com -->
      <div class="formbold-form-wrapper">
        <!-- <img src="your-image-here.jpg"> -->
        <form action="https://formbold.com/s/FORM_ID" method="POST">
          <div class="formbold-input-flex">
            <div>
              <label for="firstname" class="formbold-form-label">
                First Name
              </label>
              <input
                type="text"
                name="firstname"
                id="firstname"
                placeholder="Your first name"
                class="formbold-form-input"
              />
            </div>

            <div>
              <label for="lastname" class="formbold-form-label">
                Last Name
              </label>
              <input
                type="text"
                name="lastname"
                id="lastname"
                placeholder="Your last name"
                class="formbold-form-input"
              />
            </div>
          </div>

          <div class="formbold-input-flex">
            <div>
              <label for="email" class="formbold-form-label"> Email </label>
              <input
                type="email"
                name="email"
                id="email"
                placeholder="example@email.com"
                class="formbold-form-input"
              />
            </div>

            <div>
              <label class="formbold-form-label">Gender</label>

              <select
                class="formbold-form-input"
                name="occupation"
                id="occupation"
              >
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
              </select>
            </div>
          </div>

          <div class="formbold-mb-3 formbold-input-wrapp">
            <label for="phone" class="formbold-form-label"> Phone </label>

            <div>
              <input
                type="text"
                name="areacode"
                id="areacode"
                placeholder="Area code"
                class="formbold-form-input formbold-w-45"
              />

              <input
                type="text"
                name="phone"
                id="phone"
                placeholder="Phone number"
                class="formbold-form-input"
              />
            </div>
          </div>

          <div class="formbold-mb-3">
            <label for="age" class="formbold-form-label">
              Applying for Position:
            </label>
            <input
              type="text"
              name="age"
              id="age"
              class="formbold-form-input"
            />
          </div>

          <div class="formbold-mb-3">
            <label for="dob" class="formbold-form-label">
              When can you start?
            </label>
            <input
              type="date"
              name="dob"
              id="dob"
              class="formbold-form-input"
            />
          </div>

          <div class="formbold-mb-3">
            <label for="address" class="formbold-form-label"> Address </label>

            <input
              type="text"
              name="address"
              id="address"
              placeholder="Street address"
              class="formbold-form-input formbold-mb-3"
            />
            <input
              type="text"
              name="address2"
              id="address2"
              placeholder="Street address line 2"
              class="formbold-form-input"
            />
          </div>

          <div class="formbold-mb-3">
            <label for="message" class="formbold-form-label">
              Cover Letter
            </label>
            <textarea
              rows="6"
              name="message"
              id="message"
              class="formbold-form-input"
            ></textarea>
          </div>

          <div class="formbold-form-file-flex">
            <label for="upload" class="formbold-form-label">
              Upload Resume
            </label>
            <input
              type="file"
              name="upload"
              id="upload"
              class="formbold-form-file"
            />
          </div>

          <button class="formbold-btn">Apply Now</button>
        </form>
      </div>
    </div>
  </body>
</html>
