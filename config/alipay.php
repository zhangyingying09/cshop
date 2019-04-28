<?php
 return [
		//应用ID,您的APPID。
		'app_id' => "2016092500596105",

		//商户私钥，您的原始格式RSA私钥
         'merchant_private_key' => "MIIEowIBAAKCAQEA69RGHnhJlC46aZ/HMGtx5C/unAcWd/1jrXQTtF/fRCcf59uRqnJkwIbqjC+/RBWADC+LDcwChON7pRPpnFdQvR9k0jUfwSFwXWLimjx7gDSvRx/RWE00J0b3QDM2pwvm25SftgXsuCLtRF/jaiTy5UD27HTkC2Mf0TjiOxcJzS/HiIWvSfpqmFoGhOHyBiasme7OsCfY6YEh+p/kzxDELLvw13hAUC90lu6LNtmwwYZRhPm+minPmwHe/Zrzv8WW/uPcvL8vaseQpmcKoCL8WPbucjDzDC1SFYnJf+4x2JgUDcaxlveeemt58+uF8jHcSgcSUYKngnlF1n9EowBTAwIDAQABAoIBACbZNSPX1OcgJmc39uw3Bu/8JWZ2lHD3wO/V61kPYgwsFclwFjLp3UcJ8qFdTDi/AfT/7/w520Bg6QFsolMq3xYIkec+8RgzlfsMSx/1TrLz+tvQlf/h1/GQczKUPTCPeVw6w4SMvU4oEsXstd3KcGjrpsGVD+wATEF/CWWKigbOwyxDfPMJiv4ymCd8igT+4YrLEidzLXi85L2xkTkuMYnv7sv3JCUOpJjYa0csEB4N3unxT21/Voisr8z9SgHJtJOurl75RcEnyNeaDKzoIc3w3Wo8V6Ste3FVpLob70MACZZV/j40oBtZ0aUwGCrFtiXrwpN3ogHOwVbe7B16tsECgYEA+m6Ji0ZoCTijciNxvUNQjannt4e27UD6GYvQXx1zEBhYnkJakKKA4aa/gcXAciSmTBog55sD88IVNuMY41WHGLF4R8MiW6fpNPWpuZtJOYlkzSu8vHnMWHcFOagIWB6OoNICKwOYpNE4pfuwOHWVhiWkaXaDgvOxZhwoD0qyZ+kCgYEA8RKeTimMKr8YOCMa/sFMJhtDxZ9BqdWetdogQ+XMHYy3uL0AeEgIEraV8jaXgbdiy9kOrp5uIjnI4w96yNM/9HPaINbn7ltBhhpVcv/+f5uf5gPsJ18iFjJ1Pf5kKHo4Mn1Rpg+muMi85+lk0JikSDU5Mskcy7544lhavetZfAsCgYBrwD/CAyskPJBmvcVkb6ArM92VY/lbH8f8UeH36s3lMPSAM4CQFrtpW7uudI2XDxnWSK+7t0D+EpXaJeBBgD0+bK2aAuW3lgmLVeAPEjdxYCJU/OqaFbXMonlHE3tznsIzg+iW5Vc6IyNCl4Z85GrPa0bQccOoBn5ftuGtorAccQKBgQCsl2/O9d/sGrP0PO3uxeUGwy5aJhKUzOO7vlarRbJE1aITGP1lH+znuODRcFQ4AlsxJk1kpviieExig4qcjOGU2fyo1jNmat8Wa3QRyUUjhv+LZfOEnI+C5M0bfS2n7RiezSnPghUS5mSYhHgw/5deOvygZ2u+UrepFSiiIAUI0QKBgDBNykVIeqt3X3AGWYWmLGr92s5X7AyS6dmyTwcancv/PVltRUsQLr+TEuFefVtElB32/hUJCnFshPZnRFBoP3yO1M1Q+nQ+mKacYDamveNN2ko2gZ3Y4XKrjaGaiQhdChDg5lPQ3+OiVGwij0QOAy6fPv18oldYY2UCoHnkjYLx",
		//异步通知地址
		'notify_url' => "http://www.clar.com/alipay/notify",
		
		//同步跳转
		'return_url' => "http://www.clar.com/alipay/return",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
     'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuOHvIFrvdvCUD8xnAbSQcDg/xsS6lv7+v24QsMM4Q4tAZgfK9aqDBTZHkQ0wdqKivxqoiXUbLrA4KIklXzirYTYf87nQhyZsz5RYgoAhECIOpV2uDUHogBYcDyrDy78tdClbcXbDpKmKXqIsdR3hiQ/p3H294zG3yNkqEkqlbU+9PWvXca6HcJm73lqxGZbwprtoWTrp/yPZ4lbzwJGjxRD/n8RVbUk1nygRsdtj6NfyZs919gizLuKGyHeM3ZI7MjUPp3lXl5/Msmy+62zvJ9aUOvutqgV3PihjAxFoxhofVPc9OaW9s6kX9SRsRERg0xlQt9KvbzsaIOPXB0SIgwIDAQAB",
		
	    //标识沙箱环境
        "mode"=>'dev'
];