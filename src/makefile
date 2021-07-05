
cc = gcc

tartget=libhello.so

libhello.so:hello.o
	$(cc) -shared -o $@ hello.o
hello.o:hello.c 
	$(cc) -c -fPIC -O0 $<
install:
	cp ./$(tartget) ../lib
clean:
	rm -rf *.o $(tartget)
	
