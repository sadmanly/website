cc = g++
tartget = run
src = connect.cpp format_main.cpp
OBJ = $(src:.cpp=.o)
libsrc = -L /usr/lib64/mysql
lib = -lmysqlclient 
run : $(OBJ)
	$(cc) -g -Wall -o $@ $^ $(libsrc) $(lib)
$(OBJ) : $(src)
	$(cc) -g -Wall -c $^
install:
	cp -r ./run ../../bin/run
clean:
	rm -rf *.o $(tartget) ../../bin/run