import csv
csvfile = file('sample.csv','rb')
reader = csv.reader(csvfile)
for line in reader:
	print line

csvfile.close()	