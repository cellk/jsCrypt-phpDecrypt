
<?php
$pk = '-----BEGIN RSA PRIVATE KEY-----
MIIEogIBAAKCAQEAq3depP7trPq91o9TT43cEOkwbeZcQ3QM8dr+8wRv7iW2UZyr
hGiG7HK4lMiwVtvI+Pjf7NUwU7gYTWGqBuah5xLbwr76p8SwbKDKLoUM4IHjARRs
L8kBmMZ2b6K9avLUvn4ig/D/tN9lHtXhpp65WEirCGL3y1nZDaVMNVvmId5Fw9z5
mN9VJWNIe+ejoXUCwGsn/SBYi0vNp/rmp9NkNM9cbcge1bR0z7BVEfPqO6H6Wvv4
WD2kCcUzb9ZIvsE0ulkTiF3yjHu4DFuiD2mtKqSV7Zn6I0oqDvFmOHY6/LOgSeHC
ONsAsA4lAk66phKOODDnSsCAE1f1p5hItoilIwIDAQABAoIBABzKQj35//ZXc6Cf
GCH3c8fzH4qUb1F0HuhNGRm82P5nnqE9aR8mXeE9sfhpahJrfOcxAohFk4O7GXmE
uIPIHc8qv3OHlZat0+Gpbck51dusc20u/KtZWMdKK4C7ForqkwYZL7pvsL+x8sym
pOjRJdXI/c6+r1SZlXRRGOass4tj/EfzYzDenQXAc7Q5/O4DaRprjhl7KNdSEzbu
7Q+biQVXlV0BJquWKQV+fkfMxC0mFOPfJq39pUuUavpJG1LW3rFPx9959qRw5TFj
Eux90PIX2I7wi4vDDROyRCeliatPl6pjgWJHUGWL7YJIou8uZtslwO9o1mDwb+RV
L8oopmECgYEA4pjKM7sAwtBD+zA9ci5LZs3jOfzvSwKKXSYegNpPzAE7neV4VCW4
PG9f10soHjCSWjEIwohbHIqkU9b3WYGXfnnGvATveADwZnzdvLvBmIT4uqyaIUAG
VjjHKqkZhz6ZCPAEjGGoIe+ysDNkTZVMgwrXCbgCFOGauFLOdc/Yri0CgYEAwbc5
mQHXLRPysZhlxPH9zMJ/it7w4e0A2G219xlXeIqqG6s+HlQeW6ckYzOx7X/LjbFw
r1Fpqi2p4xIHeFAwSIiiIk1SmvdQp5XQPnxOJ3Jg4kLtjNpdNmnEzc0c1Zh6vjPq
hdQEvqBuXmxRgUNdlhNH51Ewvog3f0pvFyCPAo8CgYBiREpkFrPkyDbDBw+Opb7z
TVQ+QI9xox9n9/EAhixW1y4Icow1ScpVAyO4FRLHzN6bGGqpGkMQ5JsQ9Md93HJb
WeoyfZ1wGFAo0fvDLlVtlDTdl56bzs0wtRzCRmUYvq/VLWl7i5pDZVTDjvXvo1Bz
/85zm4XjklbrmpWIh+N63QKBgHT+kQXM68Uo4BHMheJdeLha26bmoLsCZdlQ4W5c
WszNipFtafXtPeyC1OIpDZPv8+MewHzSAawrKgifEe3jGFYmVy26X2KCba7ZN00V
zCnc1ZCxdUD1fQho9tiIwZprHe6T8ldjRn5O7HmQl+Um53XFLU8SZQsdv87cCJ4C
Jv0XAoGAMeRjAk8pObV8gWN3lcKOmr7OB2Q3XSpoBXZ2Kyy1M5f8D0uWcsKrpTPN
t+Qi9/7iPAtY7JqN95BvlM5pB3oVpnF6SX+4qO9UBB7NdVnEkjKyoBGHU1Y0ohs6
+X5RLraNcc3zljxU1HsqmE9iO/TBxAr+sZvicMtqlwX1sbWLoIA=
-----END RSA PRIVATE KEY-----';
$kh = openssl_pkey_get_private($pk);
$details = openssl_pkey_get_details($kh);

function to_hex($data) {
    return strtoupper(bin2hex($data));
}

echo to_hex($details['rsa']['n']);
echo '<br/><br/>';
echo to_hex($details['rsa']['e']);
echo '<br/><br/>';
?>
<script src="crypto/jsbn.js"/></script>
<script src="crypto/prng4.js"/></script>
<script src="crypto/rng.js"/></script>
<script src="crypto/rsa.js"/></script>

<script>
    var rsa = new RSAKey();
    rsa.setPublic('<?php echo to_hex($details['rsa']['n']) ?>', '<?php echo to_hex($details['rsa']['e']) ?>');

// encrypt using RSA
    var data = rsa.encrypt(JSON.stringify({
        score: 15000,
        token: '7383dbbce5a678c56a13ad5b374cb5f8591cbe86',
        sharedFb: false,
        levelAchieved: [{Level: 1, click: 0.27, Bonus: 30, Score: 15000, TotalScore: 830, Time: 15}]
    }));
    console.log(data)
</script>

<?php
$data = '4222c179ea62afcc81b3a869a2313d84359f9c4def11c68e7f16ead56a5373ad547d15d707f79c03bbbaaec7c247fe492e39e409fafdde30f3a1da985693002b29ca4a67f76f027951167a6bd1bf8c840c3537205d364fc59e90df009e94930d0a6067c7de7bf896d27e6e8e7be47f417c10ae91a05d8c1a1e7d1a3e570494398ac72ee38a9c79b0ffaa14c5c5469eb7dcc55cdd674fa48df361a5514fcd50af26cccade22f7ec3d3b106bbf73f986e1f06c6a7978238e865586c36e78e5ca68c9c9c8cc12cd92eca42c3d3cbbce626ea587b65e972cb43d34c4a046c3b93437db5b89788f1300d6bc9d00f7397c042d00f8b97783f48e97b7766ae923d90ad6';
// convert data from hexadecimal notation
$data2 = pack('H*', $data);
if (openssl_private_decrypt($data2, $r, $kh)) {
    var_dump(json_decode($r));
}