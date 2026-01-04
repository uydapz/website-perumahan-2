<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="floating-share">
    <button class="main-share-btn" onclick="toggleShareButtons()">
        <i class="fas fa-share-alt"></i>
    </button>
    <div class="social-buttons" id="socialButtons">
        <a href="#" class="social-btn fb" title="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-btn tw" title="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" class="social-btn mp" title="Alamat"><i class="fa fa-map-pin"></i></a>
        <a href="#" class="social-btn wa" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        <a href="#" class="social-btn ln" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
    </div>
</div>
<style>
    .floating-share {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 999;
    }

    .main-share-btn {
        background: #0d6efd;
        color: white;
        border: none;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        font-size: 20px;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
    }


    .social-buttons {
        display: none;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 10px;
        align-items: center;
    }

    .social-btn {
        background: #fff;
        color: #fff;
        padding: 10px;
        border-radius: 50%;
        font-size: 16px;
        width: 40px;
        height: 40px;
        text-align: center;
        line-height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }

    .fb {
        background: #3b5998;
    }

    .tw {
        background: #00acee;
    }

    .mp {
        background: #0b5a09;
    }

    .wa {
        background: #25D366;
    }

    .ln {
        background: #0077b5;
    }

    .social-btn:hover {
        opacity: 0.9;
    }
</style>
<script>
    function toggleShareButtons() {
        const buttons = document.getElementById("socialButtons");
        buttons.style.display = (buttons.style.display === "flex") ? "none" : "flex";
    }
</script>
