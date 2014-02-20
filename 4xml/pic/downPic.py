import os, urllib
class AppURLopener(urllib.FancyURLopener):
    version = "Mozilla/5.0"
def getLink():


	txtfile = open('data1500-all.txt','r')


	for line in txtfile:
		arr = line.split('|')

		urllib._urlopener = AppURLopener()
		filename = os.path.basename(arr[6])
		urllib.urlretrieve(arr[6] , filename)
		print 'ok'

getLink()