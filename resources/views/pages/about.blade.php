@extends('layouts.app')

@section('content')
        <br>
        <h2 class="text-center"><?php echo $title; ?></h2>
        <p></p>
                <ul class="list-group">
                        <li class="list-group-item"><span class="h4">We are powered by you! Join our community and start uploading now!</span></li>
                        <li class="list-group-item"><span class="h4 font-weight-bold">Users</span>
                                <ul>                              
                                        <div><i class="bi bi-search h4"></i> Search for prices of goods and services.</div>
                                        <div><i class="bi bi-card-checklist h4"></i> Compare prices of products.</div>
                                        <div><i class="bi bi-people h4"></i> Compare prices of vendors.</div>
                                        <div><i class="bi bi-graph-up h4"></i> Track the fluctuation of prices over time.</div>
                                </ul>
                        </li>
                        <li class="list-group-item"><span class="h4 font-weight-bold">Consumers</span> 
                                <ul>
                                        <div><i class="bi bi-cloud-arrow-up h4"></i> List prices of goods and services purchased.</div>
                                        <div><i class="bi bi-ladder h4"></i></i> Earn points and join the ranks to become a super shopper.</div>
                                </ul>
                        </li>
                        <li class="list-group-item"><span class="h4 font-weight-bold">Vendors</span> 
                                <ul>
                                        <div><i class="bi bi-shop h4"></i> Make potential customers aware of the products you sell.</div>
                                        <div><i class="bi bi-tag h4"></i> List your products at no cost.</div>
                                        <div><i class="bi bi-whatsapp h4"></i> Include contact information or social media handles to direct traffic to you.</div>
                                </ul>
                        </li>

                </ul>
@endsection