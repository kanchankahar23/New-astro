@extends('website.website_master')
@section('title', 'Privacy Policy')
@section('content')

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}" sizes="32x32" />
        <link rel="icon" href="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}" sizes="192x192" />
        <link rel="stylesheet" href="{{ asset('website/styles/style.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css') }}" />
        <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css') }}">

        <link rel="stylesheet" type="text/css"
            href="{{ asset('website/plugins/astro-appointment/assets/css/bootstrap.css') }}" />
        <link rel="stylesheet" type="text/css"
            href="{{ asset('website/plugins/astro-appointment/assets/css/style.css') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-style.css?ver=1') }}" />
        <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css') }}" />

        <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/bestastro.css') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-light-style.css?ver=1') }}" />

        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet" />

        <link href="{{ url('assets/css/website_style.css') }}" rel="stylesteet">
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                margin: 20px;
            }

            h1,
            h2,
            h3 {
                color: #333;
            }

            p {
                margin: 10px 0;
            }
        </style>
    </head>

    <body id="horoscope-data-container">
        @include('website.website_header')
        <div class="container" style="margin-top:100px;">
            <h1>Privacy Policy</h1>

            <p><strong>Introduction</strong></p>
            <p>This Privacy Policy describes how Astro Buddy and its affiliates (collectively "Astro Buddy," "we," "our,"
                "us") collect, use, share, protect, or otherwise process your information/personal data through our website
                and related platforms (hereinafter referred to as "Platform"). Please note that you may be able to browse
                certain sections of the Platform without registering with us. We do not offer any product/service under this
                Platform outside India, and your personal data will primarily be stored and processed in India. By visiting
                this Platform, providing your information, or availing of any product/service offered on the Platform, you
                expressly agree to be bound by the terms and conditions of this Privacy Policy, the Terms of Use, and the
                applicable service/product terms and conditions, and agree to be governed by the laws of India, including
                but not limited to the laws applicable to data protection and privacy. If you do not agree, please do not
                use or access our Platform.</p>

            <h2>Collection</h2>
            <p>We collect your personal data when you use our Platform, services, or otherwise interact with us during the
                course of our relationship. Some of the information that we may collect includes, but is not limited to,
                personal data/information provided to us during sign-up/registration or using our Platform, such as name,
                date of birth, address, telephone/mobile number, email ID, and/or any such information shared as proof of
                identity or address. Some of the sensitive personal data may be collected with your consent, such as your
                bank account or credit/debit card or other payment instrument information, or biometric information such as
                your facial features or physiological information (in order to enable use of certain features when opted
                for, available on the Platform). All of the above is in accordance with applicable law(s). You always have
                the option to not provide information by choosing not to use a particular service or feature on the
                Platform. We may track your behavior, preferences, and other information that you choose to provide on our
                Platform. This information is compiled and analyzed on an aggregated basis. We will also collect your
                information related to your transactions on the Platform and such third-party business partner platforms.
                When such a third-party business partner collects your personal data directly from you, you will be governed
                by their privacy policies. We shall not be responsible for the third-party business partner’s privacy
                practices or the content of their privacy policies, and we request you to read their privacy policies prior
                to disclosing any information. If you receive an email or a call from a person/association claiming to be
                Astro Buddy seeking any personal data like debit/credit card PIN, net-banking, or mobile banking password,
                we request you to never provide such information. If you have already revealed such information, report it
                immediately to an appropriate law enforcement agency.</p>

            <h2>Usage</h2>
            <p>We use personal data to provide the services you request. To the extent we use your personal data to market
                to you, we will provide you the ability to opt out of such uses. We use your personal data to assist sellers
                and business partners in handling and fulfilling orders; enhancing customer experience; resolving disputes;
                troubleshooting problems; informing you about online and offline offers, products, services, and updates;
                customizing your experience; detecting and protecting us against error, fraud, and other criminal activity;
                enforcing our terms and conditions; conducting marketing research, analysis, and surveys; and as otherwise
                described to you at the time of collection of information. You understand that your access to these
                products/services may be affected in the event permission is not provided to us.</p>

            <h2>Sharing</h2>
            <p>We may share your personal data internally within our group entities, our other corporate entities, and
                affiliates to provide you access to the services and products offered by them. These entities and affiliates
                may market to you as a result of such sharing unless you explicitly opt out. We may disclose personal data
                to third parties such as sellers, business partners, third-party service providers including logistics
                partners, prepaid payment instrument issuers, third-party reward programs, and other payment entities opted
                by you. These disclosures may be required for us to provide you access to our services and products, to
                comply with our legal obligations, to enforce our user agreement, to facilitate our marketing and
                advertising activities, to prevent, detect, mitigate, and investigate fraudulent or illegal activities
                related to our services. We may disclose personal and sensitive personal data to government agencies or
                other authorized law enforcement agencies if required to do so by law or in the good faith belief that such
                disclosure is reasonably necessary to respond to subpoenas, court orders, or other legal process. We may
                disclose personal data to law enforcement offices, third-party rights owners, or others in the good faith
                belief that such disclosure is reasonably necessary to: enforce our Terms of Use or Privacy Policy; respond
                to claims that an advertisement, posting, or other content violates the rights of a third party; or protect
                the rights, property, or personal safety of our users or the general public.</p>

            <h2>Security Precautions</h2>
            <p>To protect your personal data from unauthorized access or disclosure, loss, or misuse, we adopt reasonable
                security practices and procedures. Once your information is in our possession or whenever you access your
                account information, we adhere to our security guidelines to protect it against unauthorized access and
                offer the use of a secure server. However, the transmission of information is not completely secure for
                reasons beyond our control. By using the Platform, users accept the security implications of data
                transmission over the internet and the World Wide Web which cannot always be guaranteed as completely
                secure, and therefore, there would always remain certain inherent risks regarding the use of the Platform.
                Users are responsible for ensuring the protection of login and password records for their account.</p>

            <h2>Data Deletion and Retention</h2>
            <p>You have the option to delete your account by visiting your profile and settings on our Platform. This action
                would result in you losing all information related to your account. You may also write to us at the contact
                information provided below to assist you with these requests. We may, in the event of any pending grievance,
                claims, pending shipments, or any other services, refuse or delay the deletion of the account. Once the
                account is deleted, you will lose access to the account. We retain your personal data information for a
                period no longer than is required for the purpose for which it was collected or as required under any
                applicable law. However, we may retain data related to you if we believe it may be necessary to prevent
                fraud or future abuse or for other legitimate purposes. We may continue to retain your data in anonymized
                form for analytical and research purposes.</p>

            <h2>Your Rights</h2>
            <p>You may access, rectify, and update your personal data directly through the functionalities provided on the
                Platform.</p>

            <h2>Consent</h2>
            <p>By visiting our Platform or by providing your information, you consent to the collection, use, storage,
                disclosure, and otherwise processing of your information on the Platform in accordance with this Privacy
                Policy. If you disclose to us any personal data relating to other people, you represent that you have the
                authority to do so and permit us to use the information in accordance with this Privacy Policy. You, while
                providing your personal data over the Platform or any partner platforms or establishments, consent to us
                (including our other corporate entities, affiliates, lending partners, technology partners, marketing
                channels, business partners, and other third parties) contacting you through SMS, instant messaging apps,
                calls, and/or e-mails for the purposes specified in this Privacy Policy. You have the option to withdraw
                your consent that you have already provided by writing to the Grievance Officer at the contact information
                provided below. Please mention “Withdrawal of consent for processing personal data” in your subject line of
                your communication. We may verify such requests before acting on them. However, please note that your
                withdrawal of consent will not be retrospective and will be in accordance with the Terms of Use, this
                Privacy Policy, and applicable laws. In the event you withdraw consent given to us under this Privacy
                Policy, we reserve the right to restrict or deny the provision of our services for which we consider such
                information to be necessary.</p>

            <h2>Changes to this Privacy Policy</h2>
            <p>Please check our Privacy Policy periodically for changes. We may update this Privacy Policy to reflect
                changes to our information practices. We may alert/notify you about significant changes to the Privacy
                Policy, in the manner as may be required under applicable laws.</p>

            <h2>Grievance Officer</h2>
            <p><strong>Insert Name of the Office: Astro-Buddy</strong></p>
            <p><strong>Designation:</strong></p>
            <p><strong> Name and Address of the Company: Astro-buddy Madhya Pradesh India</strong></p>
            <p><strong>Contact us:</strong></p>
            <p>Phone: 9294549294</p>
            <p>Time: Monday - Friday (9:00 - 18:00)</p>
        </div>
    </body>
    <!--Price End-->


@endsection
