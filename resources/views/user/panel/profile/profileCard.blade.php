<div class="profile-info">
    <div class="profile-info__inner mb-40 text-center">

        <div class="avatar-upload mb-24">
            <div class="avatar-edit">
                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg">
                <label for="imageUpload">
                    <img src="{{ asset('assets/user/images/icons/camera.svg') }}" alt="camera" />
                </label>
            </div>
            <div class="avatar-preview" style="background-image : url({{ asset($user->avatar) }}">
                <div id="imagePreview">
                </div>
            </div>
        </div>

        <h5 class="profile-info__name mb-1">{{$user->name}}</h5>
        <span class="profile-info__designation font-14">Exclusive Author</span>
    </div>

    <ul class="profile-info-list">
        <li class="profile-info-list__item">
            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                <i class="ti ti-user"></i>
                <span class="text text-heading fw-500">Username</span>
            </span>
            <span class="profile-info-list__info">User Name</span>
        </li>
        <li class="profile-info-list__item">
            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                <i class="ti ti-mail-forward"></i>
                <span class="text text-heading fw-500">Email</span>
            </span>
            <span class="profile-info-list__info">michel15@gmail.com</span>
        </li>
        <li class="profile-info-list__item">
            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                <i class="ti ti-phone-plus"></i>
                <span class="text text-heading fw-500">Phone</span>
            </span>
            <span class="profile-info-list__info">0023840238</span>
        </li>
        <li class="profile-info-list__item">
            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                <i class="ti ti-map-pin"></i>
                <span class="text text-heading fw-500">Country</span>
            </span>
            <span class="profile-info-list__info">Malaysia</span>
        </li>
        <li class="profile-info-list__item">
            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                <i class="ti ti-currency-dollar"></i>
                <span class="text text-heading fw-500">Balance</span>
            </span>
            <span class="profile-info-list__info">$0.00 USD</span>
        </li>
        <li class="profile-info-list__item">
            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                <i class="ti ti-calendar-month"></i>
                <span class="text text-heading fw-500">Member Since</span>
            </span>
            <span class="profile-info-list__info">Jan, 01, 2024</span>
        </li>
        <li class="profile-info-list__item">
            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                <i class="ti ti-basket-check"></i>
                <span class="text text-heading fw-500">Purchased</span>
            </span>
            <span class="profile-info-list__info">0 items</span>
        </li>
    </ul>

</div>
