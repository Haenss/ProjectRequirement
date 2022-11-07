@extends('dashboard')
@section('content')
<main class="register-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h2 class="card-header text-center">Register</h2>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register.custom') }}">
                            @csrf
                            
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Nama"  name="name" id="name" value="{{ old('name') }}" class="form-control" required autofocus>
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="BirthDay" name="date" id="date" value="{{ old ('date') }}" class="form-control" required
                                    autofocus>
                                @if ($errors->has('date'))
                                <span class="text-danger">{{ $errors->first('date') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" name="email" id="email" value="{{ old ('email') }}" class="form-control" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="number" placeholder="Phone" name="phone" id="phone" value="{{ old('phone') }}" class="form-control" required>
                                @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone' ) }}</span>
                                @endif
                                <div class="form-group mb-3">
                            </div>
                        <div class="form-group mb-3">
                             <select name="job" id="job" class="form-control"  required
                                autofocus>
                                <option value="" disabled selected hidden> Job</option>
                                <option value="FrontEnd">FrontEnd</option>
                                <option value="BackEnd">BackEnd</option>
                                <option value="UI/UX">UI/UX</option>
                                <option value="FullStack">FullStack</option>
                                <option value="Mobile">Mobile</option>
                            </select> 
                            @if ($errors->has('job'))
                             <span class="text-danger">{{ $errors->first('job') }}</span>
                            @endif
                        </div>
                            
                        <div class="form-group mb-3">
                            <select  name="skill" id="skill" class="form-control" required
                            autofocus>
                                <option value="" disabled selected hidden>Skill_Set</option>
                                <option value="Vue JS">Vue JS</option>
                                <option value="Laravel">Laravel</option>
                                <option value="Figma">Figma</option>
                                <option value="Flutter">Flutter</option>
                            </select> 
                             @if ($errors->has('skill'))
                                <span class="text-danger">{{ $errors->first('skill') }}</span>
                            @endif
                        </div>

                    </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-uploads btn-danger btn-block">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {

        $(".btn-uploads").click( function() {

            var name = $("#name").val();
            var date = $("#date").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var job = $("#job").val();
            var skill = $("#skill").val();
            var token = $("meta[name='csrf-token']").attr("content"); {

                //ajax
                $.ajax({

                    url: "{{ route('register.custom') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "name": name,
                        "date": date,
                        "email": email,
                        "phone": phone,
                        "job": job,
                        "skill": skill,
                        "_token": token
                    },

                    success:function(response){

                        if (response.success) {

                            Swal.fire({
                                type: 'success',
                                title: 'Register Berhasil!',
                                text: 'silahkan login!'
                            });

                            $("#name").val('');
                            $("#date").val('');
                            $("#email").val('');
                            $("#phone").val('');
                            $("#job").val('');
                            $("#skill").val('');

                        } else {

                            Swal.fire({
                                type: 'error',
                                title: 'Register Gagal!',
                                text: 'silahkan coba lagi!'
                            });

                        }

                        console.log(response);

                    },
                })

            }

        });

    });
</script>

