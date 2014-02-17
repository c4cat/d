#

# fname=raw_input('Enter filename:') 
try:                                                  
    # f=open(fname,'r')
    f=open('data.txt','r')
except IOError:
    print 'no file'
else:
    for eachLine in f:
        print eachLine
    fobj.close

raw_input('end')     