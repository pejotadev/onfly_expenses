#!/bin/bash

# Definindo o diretório de partida
DIR=${1:-.}

# Função para imprimir a árvore de arquivos
print_tree() {
    find "$1" -print | sed -e 's;[^/]*/;|___;g;s;___|; |;g'
}

# Chamada da função com o diretório fornecido
print_tree "$DIR"
