<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oluştur</title>
</head>
<style>
   $font-family:   "Roboto";
$font-size:     14px;

$color-primary: #ABA194;

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: $font-family;
    font-size: $font-size;
    background-size: 200% 100% !important;
    animation: move 10s ease infinite;
    transform: translate3d(0, 0, 0);
    background: linear-gradient(45deg, #49D49D 10%, #A2C7E5 90%);
    height: 100vh
}

.user {
    width: 90%;
    max-width: 340px;
    margin: 10vh auto;
}

.user__header {
    text-align: center;
    opacity: 0;
    transform: translate3d(0, 500px, 0);
    animation: arrive 500ms ease-in-out 0.7s forwards;
}

.user__title {
    font-size: $font-size;
    margin-bottom: -10px;
    font-weight: 500;
    color: white;
}

.form {
    margin-top: 40px;
    border-radius: 6px;
    overflow: hidden;
    opacity: 0;
    transform: translate3d(0, 500px, 0);
    animation: arrive 500ms ease-in-out 0.9s forwards;
}

.form--no {
    animation: NO 1s ease-in-out;
    opacity: 1;
    transform: translate3d(0, 0, 0);
}

.form__input {
    display: block;
    width: 100%;
    padding: 20px;
    font-family: $font-family;
    -webkit-appearance: none;
    border: 0;
    outline: 0;
    transition: 0.3s;
    
    &:focus {
        background: darken(#fff, 3%);
    }
}

.btn {
    display: block;
    width: 100%;
    padding: 20px;
    font-family: $font-family;
    -webkit-appearance: none;
    outline: 0;
    border: 0;
    color: white;
    background: #228dcd;
    transition: 0.3s;
    
    &:hover {
        background: darken($color-primary, 5%);
    }
}

@keyframes NO {
  from, to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  10%, 30%, 50%, 70%, 90% {
    -webkit-transform: translate3d(-10px, 0, 0);
    transform: translate3d(-10px, 0, 0);
  }

  20%, 40%, 60%, 80% {
    -webkit-transform: translate3d(10px, 0, 0);
    transform: translate3d(10px, 0, 0);
  }
}

@keyframes arrive {
    0% {
        opacity: 0;
        transform: translate3d(0, 50px, 0);
    }
    
    100% {
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }
}

@keyframes move {
    0% {
        background-position: 0 0
    }

    50% {
        background-position: 100% 0
    }

    100% {
        background-position: 0 0
    }
}   
</style>
<body>
<div class="user">
    <header class="user__header">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
        <h1 class="user__title">İş Detaylarını Gör</h1>
    </header>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <form class="form" method="POST" action="{{ route('updatedetail', ['id' => $job->id]) }}">
    @csrf
        <div class="form__group">
            <input type="text" value="Müşteri İsmi : {{ $job->müsteriadi }}" class="form__input" id="müsteriadi" name="müsteriadi"/>
        </div>
        <div class="form__group">
            <input type="text" value="{{ $job->servisucreti }}TL" class="form__input" id="servisucreti" name="servisucreti" />
        </div>
        <div class="form__group">
            <input type="text" value="Açıklama : {{$job->aciklama}}" class="form__input" id="aciklama" name="aciklama"/>
        </div>
        <div class="form__group">
            <input type="text" value="Kullanici id : {{$job->kullaniciid}}" style="visible=false;" class="form__input" id="kullaniciid" name="kullaniciid"/>
        </div>
        <div class="form__group">
        <select class="form__input" style="width:100%;   font-size: 14; color:black;" placeholder="İşlem Yüzdesi" name="islemyuzdesi" id="islemyuzdesi">
            <option value="15">Başlatıldı</option>
            <option value="50">Yarıda</option>
            <option value="100">Tamamlandı</option>
            </select>
            <button class="btn" type="submit">Gönder</button>
        </div>
    </form>
</div>
<script>
</script>
  </body>
</html>