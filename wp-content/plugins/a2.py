#!/usr/bin/python
# -*- coding: utf-8 -*-
import urllib
import os,datetime,string,re
import sys

from bs4 import BeautifulSoup

__INITURL__ = "http://www.amiclubwear.com/clothing-dress-xxx4-1096red.html?aff=cj"
# __INITURL__ = "http://localhost/test.html"
soup = BeautifulSoup(urllib.urlopen(__INITURL__))

#get price
logo = 'amiclubwear'
# price = soup.find_all("span", "price")
details = soup.find_all("div", "std")
option = str(soup.fieldset.find_all("script"))
img = soup.find(id="image").get('src')
reg = re.compile('(?<=label\":\").*?(?=\")',re.S)
reg_price = re.compile('(?<=basePrice\":\").*?(?=\")',re.S)
reg_oldprice = re.compile('(?<=oldPrice\":\").*?(?=\",\"pro)',re.S)
groups = re.findall(reg,option)

try:
	sell = soup.find_all("span", "value-title")[0].string.replace(" ", "")
except:
	sell = soup.find_all("span", "value-title")[1].string.replace(" ", "")

# if(sell==''):
# 	sell = soup.find_all("span", "value-title")[1]

# sell = sell.string.replace(" ", "")

# the = price[0].string.replace(" ", "")


# def getSize():
# 	reg = re.compile('',re.S)
#     groups = re.findall(reg,html)

# for o in option:
# 	print o.string
# print option

print len(sell)


# if():
# 	print groups
# else:
# 	print '123'	


print reg_price
print reg_oldprice
