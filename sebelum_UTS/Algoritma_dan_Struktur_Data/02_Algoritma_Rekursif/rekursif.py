def pangkat_rekursif(a, n) :
  if n == 0 :
    return 1
  else :
    return a * pangkat_rekursif ( a, n -1)

a = int (input("Masukkan Bilangan A:"))
n = int (input("Masukkan Bilangan N:"))
hasil = pangkat_rekursif (a, n )
print (hasil) 