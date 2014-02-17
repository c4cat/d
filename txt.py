#

# fname=raw_input('Enter filename:') 
try:                                                  
    # f=open(fname,'r')
    f = open('data.txt','r')
except IOError:
    print 'no file'
else:
	i = 0
    for eachLine in f:
        print i
        i = i + 1
    f.close

raw_input('end')     