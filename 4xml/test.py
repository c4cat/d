import csv
csvfile = file('red.csv','rb')
reader = csv.reader(csvfile)
for line in reader:
	# for i in line:
	print line[2]
	print line[3]

csvfile.close()	