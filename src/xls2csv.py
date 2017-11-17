#!/usr/bin/env python

import xlrd
import csv
import os
import sys

try:
	filepath = sys.argv[1]
	filename = sys.argv[2]
	resultpath = sys.argv[3]
	resultname = sys.argv[4]
	wb = xlrd.open_workbook(os.path.join(filepath, filename))
	sheet = wb.sheet_by_index(0)
	fullpath = os.path.join(resultpath, resultname) 
	fp = open(fullpath, 'wb')
	wr = csv.writer(fp, quoting=csv.QUOTE_ALL)
	for rownum in xrange(sheet.nrows):
	  wr.writerow([unicode(val).encode('utf8') for val in sheet.row_values(rownum)])
	print fullpath
except IndexError:
	print 'Script enviroment variables must be set'
