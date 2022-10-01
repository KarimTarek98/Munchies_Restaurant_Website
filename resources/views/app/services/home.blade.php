
@php
    $services = App\Models\Service::latest()->limit(4)->get();
@endphp

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">

            @foreach ($services as $service)
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x {{ $service->service_icon }} text-primary mb-4"></i>
                        <h5>{{ $service->service_name }}</h5>
                        <p>{{ Str::limit($service->service_desc, 80) }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
