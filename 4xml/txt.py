#ver for txt file
# shoes-2022 dress-443 notBoth-658

from xml.dom import minidom 
import traceback 

import urllib2,cookielib
import os,datetime,string
import sys,csv,re

from bs4 import BeautifulSoup

def getLink():
	txtfile = open('data1-10.txt','r')

	shoes = ['Heels','Sandals','Boots','Booties','Wedges','Flats','Pumps']
	dress = ['dress','Dress','Dresses','dresses','jumpsuit','jumpsuits','Skirts','rompers','romper']

	for line in txtfile:
		print 'please wait...'
		arr = line.split('|')
		arr2 =  arr[1].split(' ')
		if(set(arr2).intersection(set(shoes))):
			the_type = list(set(arr2).intersection(set(shoes)))
			print arr[0]+' is shoessss!'
			getData(arr[0],arr[1],arr[4],arr[6],arr[7],arr[8],arr[18],the_type)
			print 'No.'+ str(arr[0]) +' is finish'
		elif(set(arr2).intersection(set(dress))):
			the_type = ['Dresses']
			print arr[0]+' is dresssss!'
			getData(arr[0],arr[1],arr[4],arr[6],arr[7],arr[8],arr[18],the_type)
			print 'No.'+ str(arr[0]) +' is finish'
		else:
			the_type = ''
			print arr[0]+' both not'

		


def getData(theid,title,url,img,price,oldprice,stock,the_type):
	opener = urllib2.build_opener(urllib2.HTTPCookieProcessor(cookielib.CookieJar()))
	opener.addheaders = [('User-agent', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.1.4322)')]
	f = opener.open(url)
	c = f.read()
	f.close()
	# print c
	reg = re.compile('(?<=replace\(\').*?(?=\'\))',re.S)
	c = re.findall(reg,c)[0]

	soup = BeautifulSoup(urllib2.urlopen(c))

	getSize = str(soup.find_all("select","size_select"))
	regGetSize = re.compile('(?<=\"\>).*?(?=\<)',re.S)
	arrSize = re.findall(regGetSize,getSize)
	del arrSize[0:2]
	# print arrSize



	createCsv(theid,img)
	print 'csv done!'
	try:
		createItem(title,theid,price,oldprice,arrSize,url,stock,the_type)
		print 'xml done!'
	except:
		print 'no.'+str(theid)+' is worng!'


def createCsv(theid,img):
	img = os.path.basename(img)
	img = 'http://dress4club.com/wp-content/uploads/2014/00/' + str(img)
	filename='csv/'+str(theid)+'.csv'
	csvfile = file(filename,'w')
	write = csv.writer(csvfile)
	write.writerow(['post_id','post_type','post_thumbnail'])
	data=[(theid,'product',img)]
	write.writerows(data)
	csvfile.close()


def createItem(a_title,a_id,a_price,a_old_price,arr_size,a_buylink,stock,a_type):
	filename = 'xml/' + str(a_id) + '.xml'
	f = open(filename, "w") 
	
	doc = minidom.Document() 
	## item start
	item = doc.createElement("item") 
	doc.appendChild(item) 

	title = doc.createElement("title") 
	item.appendChild(title) 
	text = doc.createTextNode(a_title) 
	title.appendChild(text)
	link = doc.createElement("link") 
	item.appendChild(link) 
	#
	link_content = a_title.replace(' ','-')
	#
	text = doc.createTextNode(link_content) 
	link.appendChild(text)
	pubDate = doc.createElement("pubDate") 
	item.appendChild(pubDate) 
	text = doc.createTextNode("Thu, 16 Jan 2014 06:49:40 +0000") 
	pubDate.appendChild(text)
	creator = doc.createElement("dc:creator") 
	item.appendChild(creator) 
	text = doc.createTextNode("Thu, 16 Jan 2014 06:49:40 +0000") 
	creator.appendChild(text)
	guid = doc.createElement("guid")
	guid.setAttribute("isPermaLink", "false")  
	item.appendChild(guid) 
	text = doc.createTextNode("http://dress4club.com/?post_type=product&#038;p="+str(a_id)) 
	guid.appendChild(text)
	description = doc.createElement("description")
	item.appendChild(description) 
	text = doc.createTextNode("") 
	description.appendChild(text)
	content = doc.createElement("content:encoded")
	item.appendChild(content) 

	# cdata = doc.createCDATASection(a_des)
	text = doc.createTextNode(" ")
	# content.appendChild(cdata)
	content.appendChild(text)

	post_id = doc.createElement("wp:post_id")
	item.appendChild(post_id) 
	text = doc.createTextNode(str(a_id)) 
	post_id.appendChild(text)
	post_date = doc.createElement("wp:post_date")
	item.appendChild(post_date) 
	text = doc.createTextNode("2014-01-12 14:40:25") 
	post_date.appendChild(text)
	status = doc.createElement("wp:status")
	item.appendChild(status) 
	text = doc.createTextNode("draft") 
	status.appendChild(text)
	post_name = doc.createElement("wp:post_name")
	item.appendChild(post_name) 
	text = doc.createTextNode(link_content) 
	post_name.appendChild(text)
	post_type = doc.createElement("wp:post_type")
	item.appendChild(post_type) 
	text = doc.createTextNode("product") 
	post_type.appendChild(text)

	# category = doc.createElement("category")
	# category.setAttribute("domain", "brand") 
	# category.setAttribute("nicename", "ami-clubwear") 
	# item.appendChild(category) 
	# cdata = doc.createCDATASection('AMI Clubwear')
	# category.appendChild(cdata)

	# category = doc.createElement("category")
	# category.setAttribute("domain", "collection") 
	# category.setAttribute("nicename", "glitz-glam") 
	# item.appendChild(category) 
	# cdata = doc.createCDATASection('Glitz &amp; Glam')
	# category.appendChild(cdata)

	if (a_type):
		for i in a_type:
			category = doc.createElement("category")
			category.setAttribute("domain", "product_category") 
			category.setAttribute("nicename", str(i))
			item.appendChild(category) 
			cdata = doc.createCDATASection(str(i))
			category.appendChild(cdata)

	for i in arr_size:
		category = doc.createElement("category")
		category.setAttribute("domain", "size") 
		category.setAttribute("nicename", i) 
		item.appendChild(category) 
		cdata = doc.createCDATASection(i)
		category.appendChild(cdata)

	#wp:postmeta
	#1 seo-title
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("seo-title")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	cdata = doc.createCDATASection(a_title)
	meta_value.appendChild(cdata)
	#1.1
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("seo_sep")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	cdata = doc.createCDATASection('default')
	meta_value.appendChild(cdata)
	#2 price
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("price")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	text = doc.createTextNode(a_price)
	meta_value.appendChild(text)
	#3 status
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("status")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	cdata = doc.createCDATASection(stock)
	meta_value.appendChild(cdata)
	# out of stock
	if(len(stock)>9):
		postmeta = doc.createElement("wp:postmeta")
		item.appendChild(postmeta) 
		meta_key = doc.createElement("wp:meta_key")
		postmeta.appendChild(meta_key) 
		text = doc.createTextNode("out_of_stock")
		meta_key.appendChild(text)
		meta_value = doc.createElement("wp:meta_value")
		postmeta.appendChild(meta_value) 
		cdata = doc.createCDATASection('1')
		meta_value.appendChild(cdata)

	#4 seo_title
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("seo_title")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	text = doc.createTextNode(a_title)
	meta_value.appendChild(text)
	#4 reg price
	
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("regular_price")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	if(a_old_price == a_price):
		text = doc.createTextNode('')
	else:
		text = doc.createTextNode('a_old_price')	
	meta_value.appendChild(text)

	#4 tagline_term
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("tagline_term")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	cdata = doc.createCDATASection('size')
	meta_value.appendChild(cdata)

	#4 buylink ver-cdata
	# postmeta = doc.createElement("wp:postmeta")
	# item.appendChild(postmeta) 
	# meta_key = doc.createElement("wp:meta_key")
	# postmeta.appendChild(meta_key) 
	# text = doc.createTextNode("buylink")
	# meta_key.appendChild(text)
	# meta_value = doc.createElement("wp:meta_value")
	# postmeta.appendChild(meta_value) 
	# cdata = doc.createCDATASection(a_buylink)
	# meta_value.appendChild(cdata)
#4 buylink ver-ctext
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("buylink")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	text = doc.createTextNode(a_buylink)
	meta_value.appendChild(text)

	#4 imagesize
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("imagesize")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	cdata = doc.createCDATASection('pic-default')
	meta_value.appendChild(cdata)
	#4 imagecrop_method
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("imagecrop_method")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	cdata = doc.createCDATASection('1')
	meta_value.appendChild(cdata)
	#4 imagecrop
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("imagecrop")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	cdata = doc.createCDATASection('c')
	meta_value.appendChild(cdata)
	#4 imagecrop
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("imagecrop")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	cdata = doc.createCDATASection('c')
	meta_value.appendChild(cdata)
	#4 mark_as_new
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("mark_as_new")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	cdata = doc.createCDATASection('off')
	meta_value.appendChild(cdata)
	#4 mark_as_onsale
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("mark_as_onsale")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	cdata = doc.createCDATASection('off')
	meta_value.appendChild(cdata)
	#5 in_stock text
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("instock_text")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	text = doc.createTextNode('In Stock')
	meta_value.appendChild(text)
	#out stock
	postmeta = doc.createElement("wp:postmeta")
	item.appendChild(postmeta) 
	meta_key = doc.createElement("wp:meta_key")
	postmeta.appendChild(meta_key) 
	text = doc.createTextNode("sold_text")
	meta_key.appendChild(text)
	meta_value = doc.createElement("wp:meta_value")
	postmeta.appendChild(meta_value) 
	text = doc.createTextNode('Out of Stock')
	meta_value.appendChild(text)

	# print doc
	doc.writexml(f, "\t", "\t", "\n", "utf-8") 
	f.close() 
	#end create xml

getLink()


