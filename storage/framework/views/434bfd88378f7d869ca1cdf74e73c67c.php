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
    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
    <form class="form" method="POST" action="<?php echo e(route('detail', ['id' => $job->id])); ?>">
    <?php echo csrf_field(); ?>
        <div class="form__group">
            <input type="text" value="Müşteri İsmi : <?php echo e($job->müsteriadi); ?>" class="form__input" id="müsteriadi" name="müsteriadi"/>
        </div>
        <div class="form__group">
            <input type="text" value="<?php echo e($job->servisucreti); ?>TL" class="form__input" id="servisucreti" name="servisucreti" />
        </div>
        <!--<div class="form__group">
            <input type="date" class="form__input" id="bastarih" name="bastarih" value="<?php echo e($job->bastarih); ?>"/>
        </div>-->
        <div class="form__group">
            <input type="text" value="Açıklama : <?php echo e($job->aciklama); ?>" class="form__input" id="aciklama" name="aciklama"/>
        </div>
        <div class="form__group">
            <input type="text" value="Kullanici id : <?php echo e($job->kullaniciid); ?>" style="visible=false;" class="form__input" id="kullaniciid" name="kullaniciid"/>
        </div>
        <div class="form__group">
        <button id="completeButton" class="btn" data-job-id="<?php echo e($job->id); ?>" style="cursor:pointer; background:lightgreen; color:black;">İşi Bitir</button>
        </div>
    </form>
</div>
<script>
 document.addEventListener('DOMContentLoaded', function () {
        const completeButton = document.getElementById('completeButton');
        completeButton.addEventListener('click', function () {
            const jobId = completeButton.getAttribute('data-job-id');
            fetch(`/detail/${jobId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                window.location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>
  </body>
</html><?php /**PATH C:\xamppX64\htdocs\CustomerManagementSystem\resources\views/detail.blade.php ENDPATH**/ ?>