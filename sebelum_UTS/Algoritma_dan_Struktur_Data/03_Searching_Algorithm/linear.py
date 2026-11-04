import time
start_time = time.perf_counter()
for i in range(1000000):
    pass
data =[
    "E41260301","E41260302", "E41260303", "E41260304", "E41260305"
]
def linear_search(data, target):
    for i in range(len(data)):
        if data[i] == target:
            return i
    return -1
target=str(input("pilih data target : "))
hasil = linear_search(data, target)
if hasil != -1:
    print("data ditemukan pada indeks ke-", hasil)
else:
    print("data tidak ditemukan")
end_time = time.perf_counter()
processing_time = end_time - start_time
print(f"Waktu pemrosesan: {processing_time:.5f} detik")
