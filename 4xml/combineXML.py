import os
 
def hebing(fdir,outfile):
    file_list = os.listdir(fdir)
    file_to_write = file(outfile,'w')
    for f in file_list:
        file_to_read = file(fdir + str(f),'r')
        file_to_write.write('\r\n <!------------')
        file_to_write.write(str(f))
        file_to_write.write('------------> \r\n')
        file_to_write.write('\r\n')
         
        while True:
            line = file_to_read.readlines();
            line= ''.join(line[1:])
            if len(line) == 0:
                break
            else:
                file_to_write.write(line)
        file_to_read.close()
     
    file_to_write.close()
 
if __name__ == '__main__':
    hebing('xml/','hebing.xml') #fdir must end with '/'