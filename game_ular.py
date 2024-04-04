import pygame
import time
import random

pygame.init()

# Warna
putih = (255, 255, 255)
hitam = (0, 0, 0)
merah = (213, 50, 80)
hijau = (0, 255, 0)
biru = (50, 153, 213)

# Ukuran layar
lebar = 800
tinggi = 600

# Ukuran ular
ukuran_ular = 10
kecepatan = 15

# Font
font = pygame.font.SysFont("bahnschrift", 25)

layar = pygame.display.set_mode((lebar, tinggi))
pygame.display.set_caption("Game Ular")

clock = pygame.time.Clock()

# Fungsi untuk menggambar ular
def ular(ukuran_ular, daftar_ular):
    for x in daftar_ular:
        pygame.draw.rect(layar, hitam, [x[0], x[1], ukuran_ular, ukuran_ular])

# Fungsi untuk pesan teks
def pesan_teks(teks, warna):
    tampilan_teks = font.render(teks, True, warna)
    return tampilan_teks, tampilan_teks.get_rect()

# Fungsi untuk membuat makanan
def buat_makanan():
    x_makanan = round(random.randrange(0, lebar - ukuran_ular) / 10.0) * 10.0
    y_makanan = round(random.randrange(0, tinggi - ukuran_ular) / 10.0) * 10.0
    return x_makanan, y_makanan

# Fungsi utama game
def game_loop():
    game_over = False
    game_close = False

    x_ular = lebar / 2
    y_ular = tinggi / 2

    x_ular_perubahan = 0
    y_ular_perubahan = 0

    daftar_ular = []
    panjang_ular = 1

    x_makanan, y_makanan = buat_makanan()

    while not game_over:

        while game_close == True:
            layar.fill(putih)
            pesan_pertama, pesan_pertama_rect = pesan_teks("Kamu kalah! Tekan C untuk coba lagi atau Q untuk keluar.", merah)
            pesan_pertama_rect.center = ((lebar / 2), (tinggi / 2))
            layar.blit(pesan_pertama, pesan_pertama_rect)

            pygame.display.update()

            for event in pygame.event.get():
                if event.type == pygame.KEYDOWN:
                    if event.key == pygame.K_q:
                        game_over = True
                        game_close = False
                    if event.key == pygame.K_c:
                        game_loop()

        for event in pygame.event.get():
            if event.type == pygame.QUIT:
                game_over = True
            if event.type == pygame.KEYDOWN:
                if event.key == pygame.K_LEFT:
                    x_ular_perubahan = -ukuran_ular
                    y_ular_perubahan = 0
                elif event.key == pygame.K_RIGHT:
                    x_ular_perubahan = ukuran_ular
                    y_ular_perubahan = 0
                elif event.key == pygame.K_UP:
                    y_ular_perubahan = -ukuran_ular
                    x_ular_perubahan = 0
                elif event.key == pygame.K_DOWN:
                    y_ular_perubahan = ukuran_ular
                    x_ular_perubahan = 0

        if x_ular >= lebar or x_ular < 0 or y_ular >= tinggi or y_ular < 0:
            game_close = True
        x_ular += x_ular_perubahan
        y_ular += y_ular_perubahan
        layar.fill(putih)
        pygame.draw.rect(layar, hijau, [x_makanan, y_makanan, ukuran_ular, ukuran_ular])
        ular_kepala = []
        ular_kepala.append(x_ular)
        ular_kepala.append(y_ular)
        daftar_ular.append(ular_kepala)
        if len(daftar_ular) > panjang_ular:
            del daftar_ular[0]

        for x in daftar_ular[:-1]:
            if x == ular_kepala:
                game_close = True

        ular(ukuran_ular, daftar_ular)

        pygame.display.update()

        if x_ular == x_makanan and y_ular == y_makanan:
            x_makanan, y_makanan = buat_makanan()
            panjang_ular += 1

        clock.tick(kecepatan)

    pygame.quit()
    quit()

game_loop()
