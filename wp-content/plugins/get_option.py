import re

html = 'new Product.Config({"attributes":{"119":{"id":"119","code":"size","label":"Size","options":[{"id":"36","label":"S","price":"0","oldPrice":"0","products":["1217512"]},{"id":"37","label":"M","price":"0","oldPrice":"0","products":["1217513"]},{"id":"38","label":"L","price":"0","oldPrice":"0","products":["1217514"]}]}},"template":"$#{price}","basePrice":"12.99","oldPrice":"29.99","productId":"1217515","chooseText":"Choose an Option...","taxConfig":{"includeTax":false,"showIncludeTax":false,"showBothPrices":false,"defaultTax":9,"currentTax":0,"inclTaxTitle":"Incl. Tax"}});'

reg = re.compile('(?<=basePrice\":\").*?(?=\")',re.S)
reg2 = re.compile('(?<=oldPrice\":\").*?(?=\",\"pro)',re.S)
groups = re.findall(reg,html)
# del groups[0]
groups2 = re.findall(reg2,html)

print groups[0]
print groups2.pop()
