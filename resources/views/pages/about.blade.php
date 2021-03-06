@extends('layouts.app')

@section('content')
    <br>
    <h2 class="text-center mb-3"><?php echo $title; ?></h2>
    
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <ul class="list-group">
                <li class="list-group-item"><span class="h4">We are powered by you! Join our community and start uploading now!</span></li>
                <li class="list-group-item"><div class="h4 fw-bold mb-2">Users</div>
                    <ul>                              
                        <div class="fs-5 mb-1"><i class="bi bi-search h4"></i> Search for prices of goods and services</div>
                        <div class="fs-5 mb-1"><i class="bi bi-card-checklist h4"></i> Compare prices of goods and services</div>
                        <div class="fs-5 mb-1"><i class="bi bi-people h4"></i> Compare prices of vendors</div>
                        <div class="fs-5 mb-1"><i class="bi bi-graph-up h4"></i> Track the fluctuation of prices over time</div>
                        <div class="fs-5 mb-1"><i class="bi bi-hand-thumbs-up h4"></i> Like posts to let other users know the price is right</div>
                    </ul>
                </li>
                <li class="list-group-item"><div class="h4 fw-bold mb-2">Consumers</div> 
                    <ul>
                        <div class="fs-5 mb-1"><i class="bi bi-cloud-arrow-up h4"></i> List prices of goods and services purchased</div>
                        <div class="fs-5 mb-1"><i class="bi bi-ladder h4"></i></i> Earn points and join the ranks to become a super shopper</div>
                    </ul>
                </li>
                <li class="list-group-item"><div class="h4 fw-bold mb-2">Vendors</div> 
                    <ul>
                        <div class="fs-5 mb-1"><i class="bi bi-shop h4"></i> Make potential customers aware of the products you sell</div>
                        <div class="fs-5 mb-1"><i class="bi bi-tag h4"></i> List your products at no cost</div>
                        <div class="fs-5 mb-1"><i class="bi bi-whatsapp h4"></i> Include contact information or social media handles to direct traffic to you</div>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
@endsection