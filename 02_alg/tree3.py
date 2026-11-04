class Node:
    def __init__(self, data):
        self.data = data
        self.kiri = None
        self.kanan = None

def insert(root, data):
    if root is None:
        return Node(data)
    if data < root.data:
        root.kiri = insert(root.kiri, data)
    else:
        root.kanan = insert(root.kanan, data)
    return root

def inorder(root):
    if root:
        inorder(root.kiri)
        print(root.data, end=" ")
        inorder(root.kanan)

def preorder(root):
    if root:
        print(root.data, end=" ")
        preorder(root.kiri)
        preorder(root.kanan)

def postorder(root):
    if root:
        postorder(root.kiri)
        postorder(root.kanan)
        print(root.data, end=" ")

def tinggi(root):
    if root is None:
        return 0
    return 1 + max(tinggi(root.kiri), tinggi(root.kanan))

def cari(root, x):
    if root is None:
        return False
    if x == root.data:
        return True
    if x < root.data:
        return cari(root.kiri, x)
    return cari(root.kanan, x)

root = None
for n in [50, 30, 70, 20, 40, 60, 80]:
    root = insert(root, n)

print("Inorder   : ", end=""); inorder(root); print()
print("Preorder  : ", end=""); preorder(root); print()
print("Postorder : ", end=""); postorder(root); print()
print("Tinggi    :", tinggi(root))
print("Cari 60   :", cari(root, 60))
print("Cari 90   :", cari(root, 90))