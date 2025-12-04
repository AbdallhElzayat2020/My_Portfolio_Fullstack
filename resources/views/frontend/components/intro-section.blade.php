<div class="col-xl-4">
    <div class="card profile-card">
        <div class="card-body">
            <div class="image text-center">
                @php
                    $about = $about ?? null;
                    // Default values from seeder
                    $defaultName = 'Abdullah Elzayat';
                    $defaultIntro = 'A Passionate <span>Fullstack Laravel Developer</span> having <span>4 years</span> of experiences. Worked as a sole developer and in small teams, reporting to senior developers and product managers. Worked with people from all around the world and in different time zones, so I\'m confident in my communication skills.';
                    $defaultExperience = 'Full-stack web developer with 2 years of <span>Laravel</span> experience, 2 years of <span>React</span> experience, and 5 years of coding experience.';
                    $defaultEmail = 'abdallhelzayat194@gmail.com';
                    $defaultPhone = '+201212484233';
                    $defaultLinks = [
                        'upwork' => 'https://www.upwork.com/freelancers/~0118efbb6f6aad23b8',
                        'linkedin' => 'https://www.linkedin.com/in/abdallh-elzayat-924a00259/',
                        'facebook' => 'https://www.facebook.com/abdalla.elzayat.73/',
                        'github' => 'https://github.com/AbdallhElzayat2020',
                        'whatsapp' => 'https://wa.me/201212484233',
                    ];

                    // Get profile image from database or use default
                    $profileImage = $about?->image?->url ?? asset('assets/frontend/img/Me.jpg');
                @endphp
                <img src="{{ $profileImage }}" alt="profile">
            </div>
            @php
                $aboutName = $about->name ?? $defaultName;
                $description = $about->description ?? [];
                if (is_string($description)) {
                    $description = ['intro' => $description];
                }
                $intro = $description['intro'] ?? $defaultIntro;
                $experience = $description['experience'] ?? $defaultExperience;
                $email = $about->email ?? $defaultEmail;
                $phone = $about->phone ?? $defaultPhone;
                $links = [
                    'upwork' => $about->upwork_link ?? $defaultLinks['upwork'],
                    'linkedin' => $about->linkedin_link ?? $defaultLinks['linkedin'],
                    'facebook' => $about->facebook_link ?? $defaultLinks['facebook'],
                    'github' => $about->github_link ?? $defaultLinks['github'],
                    'whatsapp' => $about->whatsapp_link ?? $defaultLinks['whatsapp'],
                ];
            @endphp
            <div class="text">
                <h3 class="card-title">{{ $aboutName }} 👋</h3>
                <p>{!! $intro !!}</p>

                <hr>
                <p>{!! $experience !!}</p>


                <!-- buttons for contact -->
                <div class="common-button-groups">
                    <a class="btn btn-call" href="{{ $links['whatsapp'] }}" target="_blank">
                        <svg class="icon" width="25" height="24" viewBox="0 0 25 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.5 4H9.5L11.5 9L9 10.5C10.071 12.6715 11.8285 14.429 14 15.5L15.5 13L20.5 15V19C20.5 19.5304 20.2893 20.0391 19.9142 20.4142C19.5391 20.7893 19.0304 21 18.5 21C14.5993 20.763 10.9202 19.1065 8.15683 16.3432C5.3935 13.5798 3.73705 9.90074 3.5 6C3.5 5.46957 3.71071 4.96086 4.08579 4.58579C4.46086 4.21071 4.96957 4 5.5 4Z"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M15.5 7C16.0304 7 16.5391 7.21071 16.9142 7.58579C17.2893 7.96086 17.5 8.46957 17.5 9"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M15.5 3C17.0913 3 18.6174 3.63214 19.7426 4.75736C20.8679 5.88258 21.5 7.4087 21.5 9"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Contact Me
                    </a>
                    <button class="btn btn-copy" data-clipboard-text="{{ $email }}">
                        <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 10C8 9.46957 8.21071 8.96086 8.58579 8.58579C8.96086 8.21071 9.46957 8 10 8H18C18.5304 8 19.0391 8.21071 19.4142 8.58579C19.7893 8.96086 20 9.46957 20 10V18C20 18.5304 19.7893 19.0391 19.4142 19.4142C19.0391 19.7893 18.5304 20 18 20H10C9.46957 20 8.96086 19.7893 8.58579 19.4142C8.21071 19.0391 8 18.5304 8 18V10Z"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M16 8V6C16 5.46957 15.7893 4.96086 15.4142 4.58579C15.0391 4.21071 14.5304 4 14 4H6C5.46957 4 4.96086 4.21071 4.58579 4.58579C4.21071 4.96086 4 5.46957 4 6V14C4 14.5304 4.21071 15.0391 4.58579 15.4142C4.96086 15.7893 5.46957 16 6 16H8"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Copy Email
                    </button>
                </div>
                <!-- buttons for contact -->

                <!-- Social Media -->
                <div class="social-media-icon">
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ $links['upwork'] }}" target="_blank">
                                <i class="fa-brands fa-upwork"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $links['linkedin'] }}" target="_blank">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $links['facebook'] }}" target="_blank">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $links['github'] }}" target="_blank">
                                <i class="fab fa-github"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $links['whatsapp'] }}" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
