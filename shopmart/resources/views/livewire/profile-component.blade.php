<div style="background-color: lavender">
    <?php
    use App\Models\User;
    use App\Models\Product;
    use App\Models\Category;
    use App\Models\Cart;
    ?>


<?php
    
$allstates = [
    'states' => [
        [
            'state' => 'Andhra Pradesh',
            'districts' => ['Anantapur', 'Chittoor', 'East Godavari', 'Guntur', 'Krishna', 'Kurnool', 'Nellore', 'Prakasam', 'Srikakulam', 'Visakhapatnam', 'Vizianagaram', 'West Godavari', 'YSR Kadapa'],
        ],
        [
            'state' => 'Arunachal Pradesh',
            'districts' => ['Tawang', 'West Kameng', 'East Kameng', 'Papum Pare', 'Kurung Kumey', 'Kra Daadi', 'Lower Subansiri', 'Upper Subansiri', 'West Siang', 'East Siang', 'Siang', 'Upper Siang', 'Lower Siang', 'Lower Dibang Valley', 'Dibang Valley', 'Anjaw', 'Lohit', 'Namsai', 'Changlang', 'Tirap', 'Longding'],
        ],
        [
            'state' => 'Assam',
            'districts' => ['Baksa', 'Barpeta', 'Biswanath', 'Bongaigaon', 'Cachar', 'Charaideo', 'Chirang', 'Darrang', 'Dhemaji', 'Dhubri', 'Dibrugarh', 'Goalpara', 'Golaghat', 'Hailakandi', 'Hojai', 'Jorhat', 'Kamrup Metropolitan', 'Kamrup', 'Karbi Anglong', 'Karimganj', 'Kokrajhar', 'Lakhimpur', 'Majuli', 'Morigaon', 'Nagaon', 'Nalbari', 'Dima Hasao', 'Sivasagar', 'Sonitpur', 'South Salmara-Mankachar', 'Tinsukia', 'Udalguri', 'West Karbi Anglong'],
        ],
        [
            'state' => 'Bihar',
            'districts' => ['Araria', 'Arwal', 'Aurangabad', 'Banka', 'Begusarai', 'Bhagalpur', 'Bhojpur', 'Buxar', 'Darbhanga', 'East Champaran (Motihari)', 'Gaya', 'Gopalganj', 'Jamui', 'Jehanabad', 'Kaimur (Bhabua)', 'Katihar', 'Khagaria', 'Kishanganj', 'Lakhisarai', 'Madhepura', 'Madhubani', 'Munger (Monghyr)', 'Muzaffarpur', 'Nalanda', 'Nawada', 'Patna', 'Purnia (Purnea)', 'Rohtas', 'Saharsa', 'Samastipur', 'Saran', 'Sheikhpura', 'Sheohar', 'Sitamarhi', 'Siwan', 'Supaul', 'Vaishali', 'West Champaran'],
        ],
        [
            'state' => 'Chandigarh (UT)',
            'districts' => ['Chandigarh'],
        ],
        [
            'state' => 'Chhattisgarh',
            'districts' => ['Balod', 'Baloda Bazar', 'Balrampur', 'Bastar', 'Bemetara', 'Bijapur', 'Bilaspur', 'Dantewada (South Bastar)', 'Dhamtari', 'Durg', 'Gariyaband', 'Janjgir-Champa', 'Jashpur', 'Kabirdham (Kawardha)', 'Kanker (North Bastar)', 'Kondagaon', 'Korba', 'Korea (Koriya)', 'Mahasamund', 'Mungeli', 'Narayanpur', 'Raigarh', 'Raipur', 'Rajnandgaon', 'Sukma', 'Surajpur  ', 'Surguja'],
        ],
        [
            'state' => 'Dadra and Nagar Haveli (UT)',
            'districts' => ['Dadra & Nagar Haveli'],
        ],
        [
            'state' => 'Daman and Diu (UT)',
            'districts' => ['Daman', 'Diu'],
        ],
        [
            'state' => 'Delhi (NCT)',
            'districts' => ['Central Delhi', 'East Delhi', 'New Delhi', 'North Delhi', 'North East  Delhi', 'North West  Delhi', 'Shahdara', 'South Delhi', 'South East Delhi', 'South West  Delhi', 'West Delhi'],
        ],
        [
            'state' => 'Goa',
            'districts' => ['North Goa', 'South Goa'],
        ],
        [
            'state' => 'Gujarat',
            'districts' => ['Ahmedabad', 'Amreli', 'Anand', 'Aravalli', 'Banaskantha (Palanpur)', 'Bharuch', 'Bhavnagar', 'Botad', 'Chhota Udepur', 'Dahod', 'Dangs (Ahwa)', 'Devbhoomi Dwarka', 'Gandhinagar', 'Gir Somnath', 'Jamnagar', 'Junagadh', 'Kachchh', 'Kheda (Nadiad)', 'Mahisagar', 'Mehsana', 'Morbi', 'Narmada (Rajpipla)', 'Navsari', 'Panchmahal (Godhra)', 'Patan', 'Porbandar', 'Rajkot', 'Sabarkantha (Himmatnagar)', 'Surat', 'Surendranagar', 'Tapi (Vyara)', 'Vadodara', 'Valsad'],
        ],
        [
            'state' => 'Haryana',
            'districts' => ['Ambala', 'Bhiwani', 'Charkhi Dadri', 'Faridabad', 'Fatehabad', 'Gurgaon', 'Hisar', 'Jhajjar', 'Jind', 'Kaithal', 'Karnal', 'Kurukshetra', 'Mahendragarh', 'Mewat', 'Palwal', 'Panchkula', 'Panipat', 'Rewari', 'Rohtak', 'Sirsa', 'Sonipat', 'Yamunanagar'],
        ],
        [
            'state' => 'Himachal Pradesh',
            'districts' => ['Bilaspur', 'Chamba', 'Hamirpur', 'Kangra', 'Kinnaur', 'Kullu', 'Lahaul &amp; Spiti', 'Mandi', 'Shimla', 'Sirmaur (Sirmour)', 'Solan', 'Una'],
        ],
        [
            'state' => 'Jammu and Kashmir',
            'districts' => ['Anantnag', 'Bandipore', 'Baramulla', 'Budgam', 'Doda', 'Ganderbal', 'Jammu', 'Kargil', 'Kathua', 'Kishtwar', 'Kulgam', 'Kupwara', 'Leh', 'Poonch', 'Pulwama', 'Rajouri', 'Ramban', 'Reasi', 'Samba', 'Shopian', 'Srinagar', 'Udhampur'],
        ],
        [
            'state' => 'Jharkhand',
            'districts' => ['Bokaro', 'Chatra', 'Deoghar', 'Dhanbad', 'Dumka', 'East Singhbhum', 'Garhwa', 'Giridih', 'Godda', 'Gumla', 'Hazaribag', 'Jamtara', 'Khunti', 'Koderma', 'Latehar', 'Lohardaga', 'Pakur', 'Palamu', 'Ramgarh', 'Ranchi', 'Sahibganj', 'Seraikela-Kharsawan', 'Simdega', 'West Singhbhum'],
        ],
        [
            'state' => 'Karnataka',
            'districts' => ['Bagalkot', 'Ballari (Bellary)', 'Belagavi (Belgaum)', 'Bengaluru (Bangalore) Rural', 'Bengaluru (Bangalore) Urban', 'Bidar', 'Chamarajanagar', 'Chikballapur', 'Chikkamagaluru (Chikmagalur)', 'Chitradurga', 'Dakshina Kannada', 'Davangere', 'Dharwad', 'Gadag', 'Hassan', 'Haveri', 'Kalaburagi (Gulbarga)', 'Kodagu', 'Kolar', 'Koppal', 'Mandya', 'Mysuru (Mysore)', 'Raichur', 'Ramanagara', 'Shivamogga (Shimoga)', 'Tumakuru (Tumkur)', 'Udupi', 'Uttara Kannada (Karwar)', 'Vijayapura (Bijapur)', 'Yadgir'],
        ],
        [
            'state' => 'Kerala',
            'districts' => ['Alappuzha', 'Ernakulam', 'Idukki', 'Kannur', 'Kasaragod', 'Kollam', 'Kottayam', 'Kozhikode', 'Malappuram', 'Palakkad', 'Pathanamthitta', 'Thiruvananthapuram', 'Thrissur', 'Wayanad'],
        ],
        [
            'state' => 'Lakshadweep (UT)',
            'districts' => ['Agatti', 'Amini', 'Androth', 'Bithra', 'Chethlath', 'Kavaratti', 'Kadmath', 'Kalpeni', 'Kilthan', 'Minicoy'],
        ],
        [
            'state' => 'Madhya Pradesh',
            'districts' => ['Agar Malwa', 'Alirajpur', 'Anuppur', 'Ashoknagar', 'Balaghat', 'Barwani', 'Betul', 'Bhind', 'Bhopal', 'Burhanpur', 'Chhatarpur', 'Chhindwara', 'Damoh', 'Datia', 'Dewas', 'Dhar', 'Dindori', 'Guna', 'Gwalior', 'Harda', 'Hoshangabad', 'Indore', 'Jabalpur', 'Jhabua', 'Katni', 'Khandwa', 'Khargone', 'Mandla', 'Mandsaur', 'Morena', 'Narsinghpur', 'Neemuch', 'Panna', 'Raisen', 'Rajgarh', 'Ratlam', 'Rewa', 'Sagar', 'Satna', 'Sehore', 'Seoni', 'Shahdol', 'Shajapur', 'Sheopur', 'Shivpuri', 'Sidhi', 'Singrauli', 'Tikamgarh', 'Ujjain', 'Umaria', 'Vidisha'],
        ],
        [
            'state' => 'Maharashtra',
            'districts' => ['Ahmednagar', 'Akola', 'Amravati', 'Aurangabad', 'Beed', 'Bhandara', 'Buldhana', 'Chandrapur', 'Dhule', 'Gadchiroli', 'Gondia', 'Hingoli', 'Jalgaon', 'Jalna', 'Kolhapur', 'Latur', 'Mumbai City', 'Mumbai Suburban', 'Nagpur', 'Nanded', 'Nandurbar', 'Nashik', 'Osmanabad', 'Palghar', 'Parbhani', 'Pune', 'Raigad', 'Ratnagiri', 'Sangli', 'Satara', 'Sindhudurg', 'Solapur', 'Thane', 'Wardha', 'Washim', 'Yavatmal'],
        ],
        [
            'state' => 'Manipur',
            'districts' => ['Bishnupur', 'Chandel', 'Churachandpur', 'Imphal East', 'Imphal West', 'Jiribam', 'Kakching', 'Kamjong', 'Kangpokpi', 'Noney', 'Pherzawl', 'Senapati', 'Tamenglong', 'Tengnoupal', 'Thoubal', 'Ukhrul'],
        ],
        [
            'state' => 'Meghalaya',
            'districts' => ['East Garo Hills', 'East Jaintia Hills', 'East Khasi Hills', 'North Garo Hills', 'Ri Bhoi', 'South Garo Hills', 'South West Garo Hills ', 'South West Khasi Hills', 'West Garo Hills', 'West Jaintia Hills', 'West Khasi Hills'],
        ],
        [
            'state' => 'Mizoram',
            'districts' => ['Aizawl', 'Champhai', 'Kolasib', 'Lawngtlai', 'Lunglei', 'Mamit', 'Saiha', 'Serchhip'],
        ],
        [
            'state' => 'Nagaland',
            'districts' => ['Dimapur', 'Kiphire', 'Kohima', 'Longleng', 'Mokokchung', 'Mon', 'Peren', 'Phek', 'Tuensang', 'Wokha', 'Zunheboto'],
        ],
        [
            'state' => 'Odisha',
            'districts' => ['Angul', 'Balangir', 'Balasore', 'Bargarh', 'Bhadrak', 'Boudh', 'Cuttack', 'Deogarh', 'Dhenkanal', 'Gajapati', 'Ganjam', 'Jagatsinghapur', 'Jajpur', 'Jharsuguda', 'Kalahandi', 'Kandhamal', 'Kendrapara', 'Kendujhar (Keonjhar)', 'Khordha', 'Koraput', 'Malkangiri', 'Mayurbhanj', 'Nabarangpur', 'Nayagarh', 'Nuapada', 'Puri', 'Rayagada', 'Sambalpur', 'Sonepur', 'Sundargarh'],
        ],
        [
            'state' => 'Puducherry (UT)',
            'districts' => ['Karaikal', 'Mahe', 'Pondicherry', 'Yanam'],
        ],
        [
            'state' => 'Punjab',
            'districts' => ['Amritsar', 'Barnala', 'Bathinda', 'Faridkot', 'Fatehgarh Sahib', 'Fazilka', 'Ferozepur', 'Gurdaspur', 'Hoshiarpur', 'Jalandhar', 'Kapurthala', 'Ludhiana', 'Mansa', 'Moga', 'Muktsar', 'Nawanshahr (Shahid Bhagat Singh Nagar)', 'Pathankot', 'Patiala', 'Rupnagar', 'Sahibzada Ajit Singh Nagar (Mohali)', 'Sangrur', 'Tarn Taran'],
        ],
        [
            'state' => 'Rajasthan',
            'districts' => ['Ajmer', 'Alwar', 'Banswara', 'Baran', 'Barmer', 'Bharatpur', 'Bhilwara', 'Bikaner', 'Bundi', 'Chittorgarh', 'Churu', 'Dausa', 'Dholpur', 'Dungarpur', 'Hanumangarh', 'Jaipur', 'Jaisalmer', 'Jalore', 'Jhalawar', 'Jhunjhunu', 'Jodhpur', 'Karauli', 'Kota', 'Nagaur', 'Pali', 'Pratapgarh', 'Rajsamand', 'Sawai Madhopur', 'Sikar', 'Sirohi', 'Sri Ganganagar', 'Tonk', 'Udaipur'],
        ],
        [
            'state' => 'Sikkim',
            'districts' => ['East Sikkim', 'North Sikkim', 'South Sikkim', 'West Sikkim'],
        ],
        [
            'state' => 'Tamil Nadu',
            'districts' => ['Ariyalur', 'Chennai', 'Coimbatore', 'Cuddalore', 'Dharmapuri', 'Dindigul', 'Erode', 'Kanchipuram', 'Kanyakumari', 'Karur', 'Krishnagiri', 'Madurai', 'Nagapattinam', 'Namakkal', 'Nilgiris', 'Perambalur', 'Pudukkottai', 'Ramanathapuram', 'Salem', 'Sivaganga', 'Thanjavur', 'Theni', 'Thoothukudi (Tuticorin)', 'Tiruchirappalli', 'Tirunelveli', 'Tiruppur', 'Tiruvallur', 'Tiruvannamalai', 'Tiruvarur', 'Vellore', 'Viluppuram', 'Virudhunagar'],
        ],
        [
            'state' => 'Telangana',
            'districts' => ['Adilabad', 'Bhadradri Kothagudem', 'Hyderabad', 'Jagtial', 'Jangaon', 'Jayashankar Bhoopalpally', 'Jogulamba Gadwal', 'Kamareddy', 'Karimnagar', 'Khammam', 'Komaram Bheem Asifabad', 'Mahabubabad', 'Mahabubnagar', 'Mancherial', 'Medak', 'Medchal', 'Nagarkurnool', 'Nalgonda', 'Nirmal', 'Nizamabad', 'Peddapalli', 'Rajanna Sircilla', 'Rangareddy', 'Sangareddy', 'Siddipet', 'Suryapet', 'Vikarabad', 'Wanaparthy', 'Warangal (Rural)', 'Warangal (Urban)', 'Yadadri Bhuvanagiri'],
        ],
        [
            'state' => 'Tripura',
            'districts' => ['Dhalai', 'Gomati', 'Khowai', 'North Tripura', 'Sepahijala', 'South Tripura', 'Unakoti', 'West Tripura'],
        ],
        [
            'state' => 'Uttarakhand',
            'districts' => ['Almora', 'Bageshwar', 'Chamoli', 'Champawat', 'Dehradun', 'Haridwar', 'Nainital', 'Pauri Garhwal', 'Pithoragarh', 'Rudraprayag', 'Tehri Garhwal', 'Udham Singh Nagar', 'Uttarkashi'],
        ],
        [
            'state' => 'Uttar Pradesh',
            'districts' => [
                'Agra',
                'Aligarh',
                'Allahabad',
                'Ambedkar Nagar',
                'Amethi (Chatrapati Sahuji Mahraj Nagar)',
                'Amroha (J.P. Nagar)',
                'Auraiya',
                'Azamgarh',
                'Baghpat',
                'Bahraich',
                'Ballia',
                'Balrampur',
                'Banda',
                'Barabanki',
                'Bareilly',
                'Basti',
                'Bhadohi',
                'Bijnor',
                'Budaun',
                'Bulandshahr',
                'Chandauli',
                'Chitrakoot',
                'Deoria',
                'Etah',
                'Etawah',
                'Faizabad',
                'Farrukhabad',
                'Fatehpur',
                'Firozabad',
                'Gautam Buddha Nagar',
                'Ghaziabad',
                'Ghazipur',
                'Gonda',
                'Gorakhpur',
                'Hamirpur',
                'Hapur (Panchsheel Nagar)',
                'Hardoi',
                'Hathras',
                'Jalaun',
                'Jaunpur',
                'Jhansi',
                'Kannauj',
                'Kanpur Dehat',
                'Kanpur Nagar',
                'Kanshiram Nagar (Kasganj)',
                'Kaushambi',
                'Kushinagar (Padrauna)',
                'Lakhimpur - Kheri',
                'Lalitpur',
                'Lucknow',
                'Maharajganj',
                'Mahoba',
                'Mainpuri',
                'Mathura',
                'Mau',
                'Meerut',
                'Mirzapur',
                'Moradabad',
                'Muzaffarnagar',
                'Pilibhit',
                'Pratapgarh',
                'RaeBareli',
                'Rampur',
                'Saharanpur',
                'Sambhal (Bhim Nagar)',
                'Sant Kabir Nagar',
                'Shahjahanpur',
                'Shamali (Prabuddh Nagar)',
                'Shravasti',
                'Siddharth Nagar',
                'Sitapur',
                'Sonbhadra',
                'Sultanpur',
                'Unnao',
                'Varanasi',
            ],
        ],
        [
            'state' => 'West Bengal',
            'districts' => ['Alipurduar', 'Bankura', 'Birbhum', 'Burdwan (Bardhaman)', 'Cooch Behar', 'Dakshin Dinajpur (South Dinajpur)', 'Darjeeling', 'Hooghly', 'Howrah', 'Jalpaiguri', 'Kalimpong', 'Kolkata', 'Malda', 'Murshidabad', 'Nadia', 'North 24 Parganas', 'Paschim Medinipur (West Medinipur)', 'Purba Medinipur (East Medinipur)', 'Purulia', 'South 24 Parganas', 'Uttar Dinajpur (North Dinajpur)'],
        ],
    ],
]; ?>





    <style>
        .cursor:hover {
            cursor: unset !important;
        }
        .hovershadow:hover{
            background-color: white !important;
        }
    </style>

    {{-- navbar start --}}
    {{-- cart badge code --}}
    @if (Auth::user() == null)
        <?php
        $cartproducts = [];
        foreach ($_COOKIE as $key => $value) {
            if (preg_match('/add\d/', $key)) {
                $cartproducts[] = $value;
            }
        }
        $badge = 0;
        ?>
        @foreach ($cartproducts as $result)
            <?php $badge++; ?>
        @endforeach
    @endif
    {{-- cart badge code ends --}}
    @if (isset(Auth::user()->id))
        <?php
        $badge = Cart::where('user_id', Auth::user()->id)->count();
        ?>
    @endif

    <nav style="position:sticky ; z-index:999 ; top:0"
        class=" navbar  navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-bottom-dark"
        data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand me-0 fw-bold fs-3" href="{{ url('/') }}">ShopMart</a>
            <div class="d-grid">

                <ul class="navbar-nav ms-3 d-sm-block d-lg-none mb-lg-0">
                    <li>
                    <a class="text-decoration-none text-white ms-2 me-2 fs-5" href="{{ url('cart') }}">Cart
                        <i class="fa-solid fa-cart-shopping fa-lg">
                        </i>
                        @if ($badge > 0)
                            <span class=" position-relative "><span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $badge }}
                                    <span class="visually-hidden">cart</span>
                                </span></span>
                        @endif
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mt-2 me-3">
                        <a class="nav-link disabled">Shop Kro Moz Kro</a>
                    </li>
                    <li class="nav-item fs-5">
                        <a class="nav-link active" aria-current="page" href="{{ url('about') }}">About</a>
                    </li>
                    <li class="nav-item fs-5">
                        <a class="nav-link" href="{{ url('topdeals') }}">Top Deals</a>
                    </li>
                    <li class="nav-item dropdown fs-5">
                        <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item fs-5" href="{{ url('/profile') }}">Profile <i
                                        class="fa-solid ms-2 fa-user"></i></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item fs-5" href="{{ url('/orderdetail') }}">My Orders <i
                                        class="fas fa-bags-shopping ms-2"></i></a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-3 d-none d-lg-block mb-lg-0">
                    <li>
                        <a class="text-decoration-none text-white ms-2 me-2 fs-5" href="{{ url('cart') }}">Cart
                            <i class="fa-solid fa-cart-shopping fa-lg">
                            </i>
                            @if ($badge > 0)
                                <span class=" position-relative "><span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ $badge }}
                                        <span class="visually-hidden">cart</span>
                                    </span></span>
                            @endif
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- navbar ends --}}


    {{-- 
    <div class="d-flex flex-row bg-secondary w-100 py-0 p-2" style="height:30px">
        <a class="text-white ms-4 fw-bold fs-5" wire:click="resetcat" style="cursor: pointer">All<i class="fa fa-external-link fa-sm ms-1" ></i></a>
        @foreach (Category::all() as $cat)
            <a class="text-white ms-4 fw-bold fs-5" wire:click="onecat({{ $cat->category_id }})"
                style="cursor: pointer">{{ $cat->category_name }}<i class="fa fa-external-link fa-sm ms-1" ></i></a>
        @endforeach
    </div> --}}




    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-sm-12 col-md-4  p-2" style="border-right: 1px solid gray;">
                <div class="flex-column d-flex shadow-lg bg-light p-2" style="position:sticky; border-radius:7px; top:70px;">
                    <div class=" p-2">
                        <div style="z-index: 899;border-radius: 8px;background-color:lavender"
                        class=" p-3 card mb-5 align-items-center justify-content-between  username d-flex flex-row">
                        <div class="name  text-primary h3">
                                <span class="text-secondary text-sm">Hii...</span>
                                {{ $name }}🤝
                            </div>
                            <div class="img">
                                <img src="{{ asset('storage/images/profile.png') }}" width="50px" height="50px">
                            </div>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="d-flex flex-column">
                            <div style="z-index: 899 ; border-radius:9px">
                                <a href="{{ url('orderdetail') }}" style="text-decoration: none;">
                                    <div
                                        class="orders hovershadow h4 p-5 d-flex align-items-center text-secondary justify-content-between" style="border-radius: 13px;background-color:lavender">
                                        ORDERS
                                        <i class="fad fa-external-link fa-sm"
                                            style="--fa-secondary-color: #0962f7;"></i>
                                    </div>
                                </a>
                                {{-- orders end --}}
                                <hr class="m-0">
                                <div class="account-settings cursor p-2" style="border-radius: 8px">
                                    <div class="p-1  fw-bold text-secondary d-flex justify-content-between">
                                        ACCOUNT SETTINGS <i class="fad fa-user-cog fa-lg"
                                            style="--fa-secondary-color: #1465eb;"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="#personal-info"
                                            class="text-primary m-2 h6 fw-bold d-flex justify-content-end"
                                            style="text-decoration:none; text-transform:capitalize">
                                            Personal Information
                                        </a>
                                        <a href="#edit-address"
                                            class="text-primary m-2 h6 fw-bold d-flex justify-content-end"
                                            style="text-decoration:none; text-transform:capitalize">
                                            Edit Address
                                        </a>
                                        <a href="#faq"
                                            class="text-primary m-2 h6 fw-bold d-flex justify-content-end"
                                            style="text-decoration:none; text-transform:capitalize">
                                            FAQ
                                        </a>
                                    </div>
                                </div>
                                <hr class="m-0">
                                {{-- account settings end --}}
                                <a wire:click="logoutUser" class="" style="text-decoration: none; cursor:pointer">
                                    <div
                                        class="logout hovershadow p-5 h4 p-3 d-flex align-items-center text-secondary justify-content-between" style="border-radius: 13px;background-color:lavender">
                                        LOG OUT
                                        <i class="fad fa-sign-out fa-lg" style="--fa-secondary-color: #1238ed;"></i>
                                    </div>
                                </a>
                                {{-- log out ends here --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- col-md-4 ends  --}}
            <div class="col-sm-12 col-md-8 p-2">
                
                    <div class="d-flex flex-column bg-white p-3" style="border-radius: 7px">
                        <div class="head">
                            <h1 class="text-primary fw-bold"id="personal-info">Personal Information</h1>
                            <div class="d-flex flex-column mt-2 p-3">
                                {{-- name starts --}}
                                <div class="name mb-3" >
                                    <form class="d-flex flex-column" wire:submit.prevent="savename">
                                        <div>
                                            <label for="name" class="text-secondary fw-bold fs-3">Name</label>
                                            @if ($editname == null)
                                                <a wire:click="editname" class="ms-3 fs-4"
                                                    style="text-decoration:none;cursor:pointer">Edit</a>
                                            @else
                                                <a wire:click="cancelname" class="ms-3 fs-4"
                                                    style="text-decoration:none;cursor:pointer">Cancel</a>
                                            @endif
                                        </div>
                                        <div class="mb-3 d-flex">
                                            <input type="text" wire:model="name"
                                                @if ($editname == null) disabled
                                            @else @endif
                                                name="name" id="name"
                                                class="form-control text-secondary w-75"
                                                value="{{ Auth::user()->name }}" style="font-size: 16px">
                                            @if ($editname == 'edit')
                                                <button type="submit" style="border-radius: 0 !important"
                                                    class="btn w-25 text-white fw-bold btn-warning">SAVE</button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                {{-- name ends  --}}

                                {{-- email starts --}}
                                <div class="email mb-3">
                                    <form class="d-flex flex-column" wire:submit.prevent="saveemail">
                                        <div>
                                            <label for="email" class="text-secondary fw-bold fs-3">Email</label>
                                            @if ($editemail == null)
                                                <a wire:click="editemail" class="ms-3 fs-4"
                                                    style="text-decoration:none;cursor:pointer">Edit</a>
                                            @else
                                                <a wire:click="cancelemail" class="ms-3 fs-4"
                                                    style="text-decoration:none;cursor:pointer">Cancel</a>
                                            @endif
                                        </div>
                                        <div class="mb-3 d-flex">
                                            <input type="email" wire:model="email"
                                                @if ($editemail == null) disabled
                                        @else @endif
                                                name="email" id="email"
                                                class="form-control text-secondary w-75"
                                                value="{{ Auth::user()->email }}" style="font-size: 16px">
                                            @if ($editemail == 'edit')
                                                <button type="submit" style="border-radius: 0 !important"
                                                    class="btn w-25 text-white fw-bold btn-warning">SAVE</button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                {{-- email ends  --}}

                                {{-- number starts --}}
                                <div class="number mb-3">
                                    <form class="d-flex flex-column" wire:submit.prevent="savenumber">
                                        <div>
                                            <label for="number" class="text-secondary fw-bold fs-3">Number</label>
                                            @if ($editnumber == null)
                                                <a wire:click="editnumber" class="ms-3 fs-4"
                                                    style="text-decoration:none;cursor:pointer">Edit</a>
                                            @else
                                                <a wire:click="cancelnumber" class="ms-3 fs-4"
                                                    style="text-decoration:none;cursor:pointer">Cancel</a>
                                            @endif
                                        </div>
                                        <div class="mb-3 d-flex">
                                            <input type="number" wire:model="number"
                                                @if ($editnumber == null) disabled
                                        @else @endif
                                                name="number" id="number"
                                                class="form-control text-secondary w-75"
                                                value="{{ Auth::user()->mobile_no }}" style="font-size: 16px">
                                            @if ($editnumber == 'edit')
                                                <button type="submit" style="border-radius: 0 !important"
                                                    class="btn w-25 text-white fw-bold btn-warning">SAVE</button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                {{-- number ends --}}

                                {{-- dob starts --}}
                                <div class="dob mb-3">
                                    <form class="d-flex flex-column" wire:submit.prevent="savedob">
                                        <div>
                                            <label for="dob" class="text-secondary fw-bold fs-3">D.O.B</label>
                                            @if ($editdob == null)
                                                <a wire:click="editdob" class="ms-3 fs-4"
                                                    style="text-decoration:none;cursor:pointer">Edit</a>
                                            @else
                                                <a wire:click="canceldob" class="ms-3 fs-4"
                                                    style="text-decoration:none;cursor:pointer">Cancel</a>
                                            @endif
                                        </div>
                                        <div class="mb-3 d-flex">
                                            <input type="date" wire:model="dob"
                                                @if ($editdob == null) disabled
                                        @else @endif
                                                name="dob" id="dob"
                                                class="form-control form-date text-secondary w-75"
                                                value="{{ Auth::user()->dob }}" style="font-size: 16px">
                                            @if ($editdob == 'edit')
                                                <button type="submit" style="border-radius: 0 !important"
                                                    class="btn w-25 text-white fw-bold btn-warning">SAVE</button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                {{-- dob ends --}}

                            </div>
                        </div>
                    </div>
                
                {{-- personal info internal link ends  --}}
                
                    <div class="d-flex flex-column mt-3 bg-white p-3" style="border-radius: 7px">
                        <div class="head">
                            <h1 class="text-success fw-bold" id="edit-address" >Edit Address</h1>
                            <div class="d-flex flex-column mt-2 p-3">
                                <div class="state mb-3">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex flex-row align-items-center ">
                                            <label for="state" class="fs-3 m-0 text-secondary fw-bold form-label">State</label>
                                            @if ($editstate==NULL)
                                            <a 
                                            wire:click="editstate"                                                 
                                            class="text-success fs-4 ms-3" style="text-decoration: none; cursor: pointer;">Edit</a>
                                            @else
                                            <a 
                                            wire:click="cancelstate"                                                 
                                            class="text-success fs-4 ms-3" style="text-decoration: none; cursor: pointer;">Cancel</a>
                                            @endif 
                                        </div>
                                        <form wire:submit.prevent="savestate">
                                            <div  class="d-flex flex-row">
                                            <select name="state" @if ($editstate==NULL)
                                                disabled
                                            @else
                                                
                                            @endif id="state" wire:model="state" class="form-select text-secondary">
                                                @foreach ($allstates['states'] as $states)
                                                    <option class="text-secondary" value="{{ $states['state']}}">{{ $states['state'] }}</option>
                                                @endforeach
                                            </select>
                                            <select name="district" @if ($editstate==NULL)
                                                disabled
                                            @else
                                                
                                            @endif id="state" wire:model="dis" class="form-select ms-1 text-secondary">
                                            @if ($editstate == "edit")
                                                <option value="" hidden selected>SELECT-DISTRICT</option>
                                            @endif
                                            @foreach ($allstates['states'] as $states['districts'])
                                            @foreach ($allstates['states'] as $states)
                                            @if ($states['state'] == $state)
                                            @foreach ($states['districts'] as $dis)
                                            <option class="text-secondary" value="{{$dis}}">{{ $dis }}</option>
                                            @endforeach
                                            @endif
                                            @endforeach
                                            @endforeach
                                            </select>
                                            @if ($editstate == 'edit')
                                                <button type="submit" style="border-radius: 0 !important"
                                                    class="btn w-25 text-white fw-bold btn-warning">SAVE</button>
                                            @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- address div ends  --}}
                <div style="text-decoration: none" id="faq">
                    <h1 class="fw-bold text-dark">FAQs</h1>
                    <p class="text-secondary">
                        <p class="text-secondary">
                            What happens when I update my email address (or mobile number)?
                        </p>
<p class="text-secondary">

    Your login email id (or mobile number) changes, likewise. You'll receive all your account related communication on your updated email address (or mobile number).
    When will my Flipkart account be updated with the new email address (or mobile number)?
</p>
<p class="text-secondary">
    It happens as soon as you confirm the verification code sent to your email (or mobile) and save the changes.
    What happens to my existing Flipkart account when I update my email address (or mobile number)?
</p>
<p class="text-secondary">
    Updating your email address (or mobile number) doesn't invalidate your account. Your account remains fully functional. You'll continue seeing your Order history, saved information and personal details.
    Does my Seller account get affected when I update my email address?
</p>
<p class="text-secondary">
    Flipkart has a 'single sign-on' policy. Any changes will reflect in your Seller account also.
</p>
                    </p>
                </div>
            </div>
            {{-- col-md-8 ends  --}}
        </div>
    </div>


   



</div>
