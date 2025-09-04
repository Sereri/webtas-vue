<script setup lang="ts">
</script>
<template>
  <footer>
    <div class="footerInfos">
      <div class="footerLogo"></div>
      <div class="footerAddress">
        <p>Tierschutz ohne Grenzen e.V.<br>
          Amtgericht Mannheim VR 333253</p>
        <p>Spendenkonto (IBAN):<br>
          DE47 670 700 240 902 333 400</p>
        <p><a href="contact.php">Kontakt</a> <a href="site.php?site=44">Impressum</a>
        </p>
      </div>
      <div class="footerLinks" style="text-align: right">
        <a href="http://www.facebook.com/group.php?gid=120104428003823">
          <span class="footerLinksButton fbgroup"></span>
        </a>
        <a href="https://www.facebook.com/pages/Tierschutz-ohne-Grenzen-eV/529951040360668">
          <span class="footerLinksButton fbsite"></span>
        </a>
        <a href="http://www.youtube.com/akzeptiere">
          <span class="footerLinksButton youtube"></span>
        </a>
      </div>
    </div>
  </footer>
</template>
<style scoped>
footer {
  margin-top: 50px;
  width: 100%;
  background: #C04040;
  padding: 20px 0;
  overflow: hidden;
}

.footerInfos {
  display: flex;
  width: 1001px;
  margin: 0 auto;
  color: #fff;
  font-family: "Verdana", "Tahoma", sans-serif;
}

.footerLogo {
  width: 140px;
  height: 170px;
  background-image: url(https://www.tierschutz-ohne-grenzen.de/images/logoblankSchmal.png);
  background-repeat: no-repeat;
  margin-right: 20px;
}

.footerAddress {
  flex: 1 0 auto;
  font-size: small;
  font-weight: bold;
  width: 250px;
  margin-right: 20px;
  height: 170px;
}

.footerAddress a {
  color: #fff;
}

.footerLinks {
  width: 311px;
  height: 64px;
}

.footerLinks a {
  display: inline-block;
}

.footerLinksButton {
  display: inline-block;
  background-repeat: no-repeat;
  width: 64px;
  height: 64px;
  border: none;
  margin: 0 0 0 10px;
}

.fbgroup {
  background-image: url(https://www.tierschutz-ohne-grenzen.de/images/link-group.png);
}

.fbsite {
  background-image: url(https://www.tierschutz-ohne-grenzen.de/images/link-site.png);
}

.youtube {
  background-image: url(https://www.tierschutz-ohne-grenzen.de/images/link-channel.png);
}
</style>
