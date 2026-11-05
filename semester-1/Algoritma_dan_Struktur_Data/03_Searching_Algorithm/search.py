import time

DATA_LINEAR = ["E41260303", "E41260302", "E41260305", "E41260301", "E41260304"]
DATA_BINARY = sorted(DATA_LINEAR)      
TARGET = "E41260305"

def linear_search(data, target):
    for i in range(len(data)):
        if data[i] == target:
            return i + 1 # ketemu di pencarian ke-..
    return -1

def binary_search(data, target):
    low, high, langkah = 0, len(data) - 1, 0
    while low <= high:
        langkah += 1
        mid = (low + high) // 2
        if data[mid] == target:
            return langkah
        elif data[mid] < target:
            low = mid + 1
        else:
            high = mid - 1
    return -1

def waktu(fungsi, data, ulang=200_000):
    mulai = time.perf_counter()
    for _ in range(ulang):
        fungsi(data, TARGET)
    return (time.perf_counter() - mulai) / ulang

print("NIM dicari :", TARGET)
print("Linear     : ketemu di pencarian ke", linear_search(DATA_LINEAR, TARGET), "| waktu", f"{waktu(linear_search, DATA_LINEAR):.9f} detik")
print("Binary     : ketemu di pencarian ke", binary_search(DATA_BINARY, TARGET), "| waktu", f"{waktu(binary_search, DATA_BINARY):.9f} detik")