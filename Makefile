export BUILDS=$(PWD)/builds
export BUILD_ZIPS=$(BUILDS)/zips
export TARGETS=$(PWD)/targets
export BUILD_BIN=$(PWD)/src/Infrastructure/Build/bin
BUILD=$(BUILD_BIN)/build.sh

build: build-legacy build-v3

build-legacy:
	@$(BUILD) legacy

build-v3:
	@$(BUILD) v3
