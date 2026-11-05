import time
start_time = time.perf_counter()
for i in range(1000000):
    pass
data =[
    "E41260301","E41260302", "E41260303", "E41260304", "E41260305"
]
def binary_search(data, target):
    low, high = 0, len(data) - 1
    while low <= high:
        mid = (low + high) // 2
        if data[mid] == target: return mid
        elif data[mid] < target: low = mid + 1
        else: high = mid - 1
    return -1
target=str(input("pilih data target : "))
hasil = binary_search(data, target)
if hasil != -1:
    print("data ditemukan pada indeks ke-", hasil)
else:
    print("data tidak ditemukan")
end_time = time.perf_counter()
processing_time = end_time - start_time
print(f"Waktu pemrosesan: {processing_time:.5f} detik")

